<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AgencyController extends AbstractController
{
    /**
     * @Route("/agency", name="agency")
     */
    public function index()
    {
        return $this->render('agency/index.html.twig', [
            'controller_name' => 'AgencyController',
        ]);

    }
}
