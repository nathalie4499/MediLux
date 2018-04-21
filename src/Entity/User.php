<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Symfony\Component\Security\Core\User\UserInterface;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")�
 * @UniqueEntity(
 * fields={"username"},
 * errorPath="username",
 * message="This username is already in use"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Acl", mappedBy="user")
     */
    private $acls;
    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salt;

    
     /**
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="user")
     */
    private $role;


    public function __construct()
    {
        $this->acls = new ArrayCollection();

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

        
    
    

    /**
     * @return Collection|Acls[]
     */
    
    
    public function getAcls(): Collection
    {
        return $this->acls;
    }

    public function addAcl(Acl $acl): self
    {
        if (!$this->acls->contains($acl)) {
            $this->acls[] = $acl;
            $acl->setUser($this);
        }

        return $this;
    }

    public function removeAcl(Acl $acl): self
    {
        if ($this->acls->contains($acl)) {
            $this->acls->removeElement($acl);
            // set the owning side to null (unless already changed)
            if ($acl->getUser() === $this) {
                $acl->setUser(null);
            }
        }

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }
    public function eraseCredentials()
    {
        return;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }
    
    /**
     * @return array[]
     */
    public function getRoles()
    {
        return array('ROLE_USER', 'ROLE_ADMIN');
    }

    
    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
        }
        return $this;
    }
    public function removeRole(Role $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
        }
        return $this;
    }
    
    
    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

 


}
