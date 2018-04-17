<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalityRepository")
 */
class Locality
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Zip", mappedBy="locality")
     */
    private $zips;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Municipality")
     */
    private $municipality;

    public function __construct()
    {
        $this->zips = new ArrayCollection();
        $this->municipality = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
        if (!$this->zips->contains($zip)) {
            $this->zips[] = $zip;
            $zip->setLocality($this);
        }

        return $this;
    }

    public function removeZip(Zip $zip): self
    {
        if ($this->zips->contains($zip)) {
            $this->zips->removeElement($zip);
            // set the owning side to null (unless already changed)
            if ($zip->getLocality() === $this) {
                $zip->setLocality(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Municipality[]
     */
    public function getMunicipality(): Collection
    {
        return $this->municipality;
    }

    public function addMunicipality(Municipality $municipality): self
    {
        if (!$this->municipality->contains($municipality)) {
            $this->municipality[] = $municipality;
        }

        return $this;
    }

    public function removeMunicipality(Municipality $municipality): self
    {
        if ($this->municipality->contains($municipality)) {
            $this->municipality->removeElement($municipality);
        }

        return $this;
    }
}
