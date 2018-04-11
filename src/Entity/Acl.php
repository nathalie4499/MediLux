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
}
