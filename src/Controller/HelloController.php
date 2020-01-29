<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function index(string $name)
    {
        return $this->render('hello/index.html.twig', [
            'name' => $name,
        ]);
    }
}
