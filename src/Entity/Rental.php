<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RentalRepository")
 */
class Rental
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Driver", inversedBy="rentals")
     */
    private $conducteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicle", inversedBy="rentals")
     */
    private $vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConducteur(): ?Driver
    {
        return $this->conducteur;
    }

    public function setConducteur(?Driver $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    public function getVehicule(): ?Vehicle
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicle $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
