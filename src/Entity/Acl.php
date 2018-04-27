<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AclRepository")
 */
class Acl
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="acl", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $search;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $patient;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $address_book;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $drugs;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $admin;

    public function getId()
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSearch(): ?bool
    {
        return $this->search;
    }

    public function setSearch(?bool $search): self
    {
        $this->search = $search;

        return $this;
    }

    public function getPatient(): ?bool
    {
        return $this->patient;
    }

    public function setPatient(?bool $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getAddressBook(): ?bool
    {
        return $this->address_book;
    }

    public function setAddressBook(?bool $address_book): self
    {
        $this->address_book = $address_book;

        return $this;
    }

    public function getDrugs(): ?bool
    {
        return $this->drugs;
    }

    public function setDrugs(?bool $drugs): self
    {
        $this->drugs = $drugs;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(?bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
