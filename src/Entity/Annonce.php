<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 */
class Annonce
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
    private $titre;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }



    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }



    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }



    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="annonces")
     * @JoinColumn(name="categorie_id",referencedColumnName="id")
     */
    private $categorie;

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

}
