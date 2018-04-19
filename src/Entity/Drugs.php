<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DrugsRepository")
 */
class Drugs
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $supplier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dosage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contraindications;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sideeffects;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $incompatibilities;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $overdose;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $components;

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

    public function getSupplier(): ?string
    {
        return $this->supplier;
    }

    public function setSupplier(?string $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(?string $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getContraindications(): ?string
    {
        return $this->contraindications;
    }

    public function setContraindications(?string $contraindications): self
    {
        $this->contraindications = $contraindications;

        return $this;
    }

    public function getSideeffects(): ?string
    {
        return $this->sideeffects;
    }

    public function setSideeffects(?string $sideeffects): self
    {
        $this->sideeffects = $sideeffects;

        return $this;
    }

    public function getIncompatibilities(): ?string
    {
        return $this->incompatibilities;
    }

    public function setIncompatibilities(?string $incompatibilities): self
    {
        $this->incompatibilities = $incompatibilities;

        return $this;
    }

    public function getOverdose(): ?string
    {
        return $this->overdose;
    }

    public function setOverdose(?string $overdose): self
    {
        $this->overdose = $overdose;

        return $this;
    }

    public function getComponents(): ?string
    {
        return $this->components;
    }

    public function setComponents(?string $components): self
    {
        $this->components = $components;

        return $this;
    }
}
