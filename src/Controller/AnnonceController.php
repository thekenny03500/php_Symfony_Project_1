<?php

namespace App\Controller;

use App\Entity\Annonce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Faker;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index()
    {
        $entityReposit = $this->getDoctrine()->getRepository(Annonce::class);

        // Recuperation de toute les annonces
        $annonces = $entityReposit->findAll();
        if(count($annonces) <= 0){
            $this->createFake();
        }
        $annonces = $entityReposit->findAll();

        return $this->render('annonce/index.html.twig', [
            'Annonces' => $annonces,
        ]);
    }

    public function createFake(){
        $entityManager = $this->getDoctrine()->getManager();
        $faker = Faker\Factory::create();

        for ($i=0;$i<15;$i++) {
            // Nouvelle donnée
            $annonce = new Annonce();
            $annonce->setTitre($faker->Name);
            $annonce->setContenu($faker->Text);
            $annonce->setCreatedAt($faker->DateTime);
            $annonce->setPrix($faker->randomFloat(2,0,5000));

            // Ajoute a la base (non insert)
            $entityManager->persist($annonce);
        }
        // Insert
        $entityManager->flush();
    }
}
