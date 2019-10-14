<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="services")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeMarketplace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresseweb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Technologie;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

    public function getTypeMarketplace(): ?string
    {
        return $this->TypeMarketplace;
    }

    public function setTypeMarketplace(string $TypeMarketplace): self
    {
        $this->TypeMarketplace = $TypeMarketplace;

        return $this;
    }

    public function getAdresseweb(): ?string
    {
        return $this->Adresseweb;
    }

    public function setAdresseweb(string $Adresseweb): self
    {
        $this->Adresseweb = $Adresseweb;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->Technologie;
    }

    public function setTechnologie(string $Technologie): self
    {
        $this->Technologie = $Technologie;

        return $this;
    }
    public function test() {
        return array_keys(get_object_vars($this));
        
    }
}
