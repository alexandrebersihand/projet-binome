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
    public function index(DefinitionRepository $repository)
    {
        $definition = $repository->findLatestPublished();
        return $this->render('definition/index.html.twig', [
            'definition' => $definition,
        ]);
    }
}
