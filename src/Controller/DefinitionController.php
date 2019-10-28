<?php

namespace App\Controller;

use App\Repository\DefinitionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefinitionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()

    {
        return $this->render('definition/index.html.twig');
    }

    /**
     * @Route("/")
     */
    public function index1(DefinitionRepository $repository)

    {
        $definition = $repository->findAll();
        return $this->render('definition/index.html.twig', [
            'definition' => $definition,
        ]);
    }
}
