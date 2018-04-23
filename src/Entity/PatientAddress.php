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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $streetnumber;
    
    /**  
    * @ORM\OneToMany(targetEntity="App\Entity\Zip", mappedBy="patientaddress")  
    * @Assert\Valid()  
    */
    private $zips;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country")
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
    
    public function getStreetnumber(): ?NumberType
    {
        return $this->streetumber;
    }
    
    public function setStreetnumber(?NumberType $streetnumber): self
    {
        $this->streetnumber = $streetnumber;
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
    
    
    /**
    
    * @return Collection|Zip[]
    
    */
    public function getZips(): Collection
    {
        return $this->zips;
    }

    public function addZip(Zip $zip): self
    {
        if(!$this->zips->contains($zip)) {
            $this->zips[] = $zip;
            $zip->setPatientAddress($this);
        }

        return $this;
    }
    
    
    
    public function removeZip(Zip $zip): self    
    {
        
        if ($this->zips->contains($zip)) {
            
            $this->zips->removeElement($zip);
            
            // set the owning side to null (unless already changed)
            
            if ($zip->getPatientAddress() === $this) {
                
                $zip->setPatientAddress(null);   
            }
        }
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
}
