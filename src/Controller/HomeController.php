<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Repository\AgencyRepository;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var OfferRepository
     */
    private $offerrep;

    public function __construct(OfferRepository $offerrep)
    {
        $this->offerrep = $offerrep;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $AllOffer = $this->offerrep->getLastedVisible();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'all_offer' => $AllOffer
        ]);
    }
}
