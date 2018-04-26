<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientAddressRepository")
 */
class PatientAddress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $streetnumber;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locality;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $canton;
      
    
    /**  
    * @ORM\Column(type="string", length=255, nullable=true)
    * @Assert\Valid()  
    */
    private $zips;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="patientaddress")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function getId()
    {
        return $this->id;
    }
    
    public function getStreetnumber(): ?string
    {
        return $this->streetnumber;
    }
    
    public function setStreetnumber(?string $streetnumber): self
    {
        $this->streetnumber = $streetnumber;
        return $this;
    }
    
    public function getStreet(): ?string
    {
        return $this->street;
    }
    
    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }
    
    public function getLocality(): ?string
    {
        return $this->locality;
    }
    
    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;
        return $this;
    }
    
    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }
    
    public function setMunicipality(?string $municipality): self
    {
        $this->municipality = $municipality;
        return $this;
    }
    
    public function getCanton(): ?string
    {
        return $this->canton;
    }
    
    public function setCanton(?string $canton): self
    {
        $this->canton = $canton;
        return $this;
    }
    
    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
    

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getZips()
    {
        return $this->zips;
    }

    /**
     * @param mixed $zips
     */
    public function setZips($zips)
    {
        $this->zips = $zips;
        return $this;
    }

}
    