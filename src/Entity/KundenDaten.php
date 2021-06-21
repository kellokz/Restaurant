<?php

namespace App\Entity;

use App\Repository\KundenDatenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KundenDatenRepository::class)
 */
class KundenDaten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stadt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefonnummer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anmerkung;

    public function __construct()
    {
        $this->bestellung = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getStadt(): ?string
    {
        return $this->stadt;
    }

    public function setStadt(string $stadt): self
    {
        $this->stadt = $stadt;

        return $this;
    }

    public function getTelefonnummer(): ?string
    {
        return $this->telefonnummer;
    }

    public function setTelefonnummer(?string $telefonnummer): self
    {
        $this->telefonnummer = $telefonnummer;

        return $this;
    }

    public function getAnmerkung(): ?string
    {
        return $this->anmerkung;
    }

    public function setAnmerkung(?string $anmerkung): self
    {
        $this->anmerkung = $anmerkung;

        return $this;
    }
}
