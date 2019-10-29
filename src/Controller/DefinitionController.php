<?php

namespace App\Controller;

use App\Repository\DefinitionRepository;
use App\Entity\Definition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/definition")
 *
 */
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
     * @Route("/provisoire")
     */
    public function index1(DefinitionRepository $repository)

    {
        $definition = $repository->findAll();
        return $this->render('definition/index.html.twig', [
            'definition' => $definition,
        ]);
    }

    /**
     * @Route("/page1/")
     */
    public function page1()
    {
        return $this->render('definition/page1.html.twig');
    }
    /**
     * @Route("/page2/")
     */
    public function page2()
    {
        return $this->render('definition/page2.html.twig');
    }

    /**
     * @Route("/page3/")
     */
    public function page3()
    {
        return $this->render('definition/page3.html.twig');
    }
    /**
     * @Route("/formulaire/")
     */
    public function formulaire()
    {
        return $this->render('definition/formulaire.html.twig');
    }

}
