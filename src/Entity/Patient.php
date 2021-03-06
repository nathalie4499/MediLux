<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 *
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     *
     */
    private $ssn;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $givenname;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     *
     */
    private $birthname;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $maritalname;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $nationality;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $language;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     */
    private $age;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $telephone;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActiveProblems", mappedBy="patient")
     *
     */
    private $activeproblemslist;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PatientAddress", mappedBy="patient")
     * @ORM\JoinTable(name="patient_address",
     *      joinColumns={@ORM\JoinColumn(name="patient_id", referencedColumnName="id")})
     */

    private $patientaddresslist;
    
    public function __construct()
    {
        $this->activeproblemslist = new ArrayCollection();
        $this->patientaddresslist = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }


    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    public function setSsn(string $ssn): self

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
    public function getAge(): ?string
    {
        return $this->age;
    }
    public function setAge(?string $age): self
    {
        $this->age = $age;
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
    
    /**
     * @return Collection|ActiveProblems[]
     */
    public function getActiveproblemslist(): Collection
    {
        return $this->activeproblemslist;
    }


    public function addActiveproblems(ActiveProblems $activeproblemslist): self

    {
        if (!$this->activeproblemslist->contains($activeproblemslist)) {
            $this->activeproblemslist[] = $activeproblemslist;
        }
        return $this;
    }
    public function removeActiveproblems(ActiveProblems $activeproblems): self
    {
        if ($this->activeproblemslist->contains($activeproblemslist)) {
            $this->activeproblemslist->removeElement($activeproblemslist);
        }
        return $this;
    }
    
    
    /**
     * @return Collection|PatientAddress[]
     */
    
    public function getPatientaddresslist(): Collection
    {
        return $this->patientaddresslist;
    }
    
    public function addPatientAddresslist(PatientAddress $patientaddresslist): self
    {
        if (!$this->patientaddresslist->contains($patientaddresslist)) {
            $this->patientaddresslist[] = $patientaddresslist;
        }
        return $this;
    }
    public function removePatientaddress(PatientAddress $patientaddress): self
    {
        if ($this->patientaddresslist->contains($patientaddresslist)) {
            $this->patientaddresslist->removeElement($patientaddresslist);
            }



        return $this;

}
}
