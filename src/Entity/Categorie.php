<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\ErrorHandler\Collecting;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $couleur;

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur($couleur): void
    {
        $this->couleur = $couleur;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Annonce", mappedBy="categorie")
     */
    private $annonces;

    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

}
