<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceFormController extends AbstractController
{
    /**
     * @Route("/annonce/form", name="annonce_form")
     */
    public function index(Request $request)
    {

        $annonce = new Annonce();
        $annonce->setCreatedAt(new \DateTime());

        $form = $this->createForm(AnnonceType::class,$annonce);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $annonce = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('annonce');
        }

        return $this->render('annonce_form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
