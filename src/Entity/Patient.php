<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ssn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $givenname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birthname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maritalname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActiveProblems", mappedBy="patient")
     */
    private $activeproblems;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PatientAddress", mappedBy="relatedpatient")
     */
    private $patientaddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    public function __construct()
    {
        $this->activeproblems = new ArrayCollection();
        $this->patientaddress = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getSsn(): ?int
    {
        return $this->ssn;
    }

    public function setSsn(int $ssn): self
    {
        $this->ssn = $ssn;

        return $this;
    }

    public function getGivenname(): ?string
    {
        return $this->givenname;
    }

    public function setGivenname(?string $givenname): self
    {
        $this->givenname = $givenname;

        return $this;
    }

    public function getBirthname(): ?string
    {
        return $this->birthname;
    }

    public function setBirthname(string $birthname): self
    {
        $this->birthname = $birthname;

        return $this;
    }

    public function getMaritalname(): ?string
    {
        return $this->maritalname;
    }

    public function setMaritalname(?string $maritalname): self
    {
        $this->maritalname = $maritalname;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }


    /**
     * @return Collection|ActiveProblems[]
     */
    public function getActiveproblems(): Collection
    {
        return $this->activeproblems;
    }

    public function addActiveproblem(ActiveProblems $activeproblem): self
    {
        if (!$this->activeproblems->contains($activeproblem)) {
            $this->activeproblems[] = $activeproblem;
            $activeproblem->setPatient($this);
        }

        return $this;
    }

    public function removeActiveproblem(ActiveProblems $activeproblem): self
    {
        if ($this->activeproblems->contains($activeproblem)) {
            $this->activeproblems->removeElement($activeproblem);
            // set the owning side to null (unless already changed)
            if ($activeproblem->getPatient() === $this) {
                $activeproblem->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PatientAddress[]
     */
    public function getPatientaddress(): Collection
    {
        return $this->patientaddress;
    }

    public function addPatientaddress(PatientAddress $patientaddress): self
    {
        if (!$this->patientaddress->contains($patientaddress)) {
            $this->patientaddress[] = $patientaddress;
            $patientaddress->setRelatedpatient($this);
        }

        return $this;
    }

    public function removePatientaddress(PatientAddress $patientaddress): self
    {
        if ($this->patientaddress->contains($patientaddress)) {
            $this->patientaddress->removeElement($patientaddress);
            // set the owning side to null (unless already changed)
            if ($patientaddress->getRelatedpatient() === $this) {
                $patientaddress->setRelatedpatient(null);
            }
        }

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

}
