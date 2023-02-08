<?php

namespace App\Entity;

use App\Repository\PatrimonyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatrimonyRepository::class)
 */
class Patrimony
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bailleur;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="patrimony")
     */
    private $User;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="patrimonies")
     */
    private $Service;

    public function __construct()
    {
        $this->User = new ArrayCollection();
        $this->Service = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getBailleur(): ?string
    {
        return $this->bailleur;
    }

    public function setBailleur(string $bailleur): self
    {
        $this->bailleur = $bailleur;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
            $user->setPatrimony($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPatrimony() === $this) {
                $user->setPatrimony(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->Service;
    }

    public function addService(Service $service): self
    {
        if (!$this->Service->contains($service)) {
            $this->Service[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->Service->removeElement($service);

        return $this;
    }
}
