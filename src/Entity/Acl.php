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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $search;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="acls")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $addressbook;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $drugs;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $patient;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $admin;

    public function getId()
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAddressbook(): ?bool
    {
        return $this->addressbook;
    }

    public function setAddressbook(?bool $addressbook): self
    {
        $this->addressbook = $addressbook;

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

    public function getPatient(): ?bool
    {
        return $this->patient;
    }

    public function setPatient(?bool $patient): self
    {
        $this->patient = $patient;

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
