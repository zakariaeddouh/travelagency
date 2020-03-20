<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    private $repository;
    private $em;

    public function __construct(OfferRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/offers", name="offer.all")
     */
    public function all()
    {
        $offers = $this->repository->findAll();
        return $this->render('offer/index.html.twig', [
            'offers' => $offers
        ]);
    }

    /**
     * @Route("/offer/{slug}-{id}", name="offer.show", requirements={"slug":"[a-z0-9\-]*"})
     */
    public function show(Offer $repository, string $slug)
    {   
        if($repository->getSlug() !== $slug)
        {
            return $this->redirectToRoute('offer.show', [
                'id' => $repository->getId(),
                'slug' => $repository->getSlug()
            ],301);
        }
        return $this->render('offer/show.html.twig', [
            'offer' => $repository
        ]);
    }

}

