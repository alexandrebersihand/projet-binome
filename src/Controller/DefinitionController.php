<?php

namespace App\Controller;

use App\Entity\Definition;
use App\Form\DefinitionType;
use App\Repository\DefinitionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/definition")
 *
 */
class DefinitionController extends AbstractController
{
    /**
     * @Route("/page3", methods="GET")
     */
    public function index1(DefinitionRepository $repository)

    {
         $definition = $repository->findLatestPublished();

        return $this->render('definition/page3.html.twig', [
            'definition' => $definition,
        ]);
    }




    /**
     * @Route("/")
     */
    public function index()

    {
        return $this->render('definition/index.html.twig');
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
     * @Route("/page3/", methods="GET")
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

    /**
     * @Route("/show/{id}", requirements={"id": "\d+"}, methods="GET")
     */
    public function show(Definition $definition)
    {
        return $this->render('definition/show.html.twig', [
            'definition' => $definition,
        ]);
    }

    /**
     * @route("/new", methods={"GET", "POST"})
     */
    public function new(Request $request)
    {

        $definition = new Definition();

        $form =$this->createForm(DefinitionType::class, $definition, [
            'validation_groups' => ['new', 'Default'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->persistDefinition($definition, 'La balise a bien été créée');
        }
        return $this->render('definition/new.html.twig', [

            'form' => $form->createView(),
        ]);
    }

    private function persistDefinition(Definition $definition, string $message)
    {
        $em =$this->getDoctrine()->getManager();
        $em->persist($definition);
        $em->flush();
        $this->addFlash('success', $message);

        return $this->redirectToRoute('app_definition_show', [
            'id' => $definition->getId(),
        ]);
    }

    /**
     * @route("/{id}/edit", requirements={"id": "\d+"}, methods={"GET", "POST"})
     */
    public function edit(Request $request, Definition $definition)
    {
        $form =$this->createForm(DefinitionType::class, $definition
           );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->persistDefinition($definition, 'La balise a bien été modifiée');
        }
        return $this->render('definition/update.html.twig', [

            'form' => $form->createView(),
            'definition' => $definition,

        ]);
    }
}
