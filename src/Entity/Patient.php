<?php

namespace App\Entity;

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
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birthplace;

    /**
     * @ORM\Column(type="integer")
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birthname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $givenname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maritalname;

    /**
     * @ORM\Column(type="integer")
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $insurance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $complementaryinsurance;

    /**
     * @ORM\Column(type="integer")
     */
    private $maritalstatus;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberchildren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="integer")
     */
    private $picture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes2;

    /**
     * @ORM\Column(type="integer")
     */
    private $record;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $family;

    /**
     * @ORM\Column(type="integer")
     */
    private $otherphysicians;

    /**
     * @ORM\Column(type="date")
     */
    private $creationdate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $modifieddate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modifiedby;

    /**
     * @ORM\Column(type="integer")
     */
    private $treatingphysician;

    /**
     * @ORM\Column(type="integer")
     */
    private $referringdoctorid;

    /**
     * @ORM\Column(type="integer")
     */
    private $risid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $luxembourgid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $otherid;

    /**
     * @ORM\Column(type="integer")
     */
    private $mediluxid;

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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(int $gender): self
    {
        $this->gender = $gender;

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

    public function getGivenname(): ?string
    {
        return $this->givenname;
    }

    public function setGivenname(string $givenname): self
    {
        $this->givenname = $givenname;

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

    public function getTitle(): ?int
    {
        return $this->title;
    }

    public function setTitle(int $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInsurance(): ?int
    {
        return $this->insurance;
    }

    public function setInsurance(?int $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getComplementaryinsurance(): ?string
    {
        return $this->complementaryinsurance;
    }

    public function setComplementaryinsurance(?string $complementaryinsurance): self
    {
        $this->complementaryinsurance = $complementaryinsurance;

        return $this;
    }

    public function getMaritalstatus(): ?int
    {
        return $this->maritalstatus;
    }

    public function setMaritalstatus(int $maritalstatus): self
    {
        $this->maritalstatus = $maritalstatus;

        return $this;
    }

    public function getNumberchildren(): ?int
    {
        return $this->numberchildren;
    }

    public function setNumberchildren(int $numberchildren): self
    {
        $this->numberchildren = $numberchildren;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPicture(): ?int
    {
        return $this->picture;
    }

    public function setPicture(int $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getNotes1(): ?string
    {
        return $this->notes1;
    }

    public function setNotes1(?string $notes1): self
    {
        $this->notes1 = $notes1;

        return $this;
    }

    public function getNotes2(): ?string
    {
        return $this->notes2;
    }

    public function setNotes2(?string $notes2): self
    {
        $this->notes2 = $notes2;

        return $this;
    }

    public function getRecord(): ?int
    {
        return $this->record;
    }

    public function setRecord(int $record): self
    {
        $this->record = $record;

        return $this;
    }

    public function getFamily(): ?int
    {
        return $this->family;
    }

    public function setFamily(?int $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getOtherphysicians(): ?int
    {
        return $this->otherphysicians;
    }

    public function setOtherphysicians(int $otherphysicians): self
    {
        $this->otherphysicians = $otherphysicians;

        return $this;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    public function getModifieddate(): ?\DateTimeInterface
    {
        return $this->modifieddate;
    }

    public function setModifieddate(?\DateTimeInterface $modifieddate): self
    {
        $this->modifieddate = $modifieddate;

        return $this;
    }

    public function getModifiedby(): ?string
    {
        return $this->modifiedby;
    }

    public function setModifiedby(?string $modifiedby): self
    {
        $this->modifiedby = $modifiedby;

        return $this;
    }

    public function getTreatingphysician(): ?int
    {
        return $this->treatingphysician;
    }

    public function setTreatingphysician(int $treatingphysician): self
    {
        $this->treatingphysician = $treatingphysician;

        return $this;
    }

    public function getReferringdoctorid(): ?int
    {
        return $this->referringdoctorid;
    }

    public function setReferringdoctorid(int $referringdoctorid): self
    {
        $this->referringdoctorid = $referringdoctorid;

        return $this;
    }

    public function getRisid(): ?int
    {
        return $this->risid;
    }

    public function setRisid(int $risid): self
    {
        $this->risid = $risid;

        return $this;
    }

    public function getLuxembourgid(): ?int
    {
        return $this->luxembourgid;
    }

    public function setLuxembourgid(?int $luxembourgid): self
    {
        $this->luxembourgid = $luxembourgid;

        return $this;
    }

    public function getOtherid(): ?int
    {
        return $this->otherid;
    }

    public function setOtherid(?int $otherid): self
    {
        $this->otherid = $otherid;

        return $this;
    }

    public function getMediluxid(): ?int
    {
        return $this->mediluxid;
    }

    public function setMediluxid(int $mediluxid): self
    {
        $this->mediluxid = $mediluxid;

        return $this;
    }
}
