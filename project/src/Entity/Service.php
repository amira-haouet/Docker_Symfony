<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sub_label;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin_publication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Patrimony::class, mappedBy="Service")
     */
    private $patrimonies;

    public function __construct()
    {
        $this->patrimonies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getSubLabel(): ?string
    {
        return $this->sub_label;
    }

    public function setSubLabel(string $sub_label): self
    {
        $this->sub_label = $sub_label;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFinPublication(): ?\DateTimeInterface
    {
        return $this->date_fin_publication;
    }

    public function setDateFinPublication(\DateTimeInterface $date_fin_publication): self
    {
        $this->date_fin_publication = $date_fin_publication;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Patrimony>
     */
    public function getPatrimonies(): Collection
    {
        return $this->patrimonies;
    }

    public function addPatrimony(Patrimony $patrimony): self
    {
        if (!$this->patrimonies->contains($patrimony)) {
            $this->patrimonies[] = $patrimony;
            $patrimony->addService($this);
        }

        return $this;
    }

    public function removePatrimony(Patrimony $patrimony): self
    {
        if ($this->patrimonies->removeElement($patrimony)) {
            $patrimony->removeService($this);
        }

        return $this;
    }
}
