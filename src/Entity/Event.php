<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuEvent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="events")
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getTypeEvent(): ?string
    {
        return $this->typeEvent;
    }

    public function setTypeEvent(string $typeEvent): self
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }

    public function getDateEvent(): ?string
    {
        return $this->dateEvent;
    }

    public function setDateEvent(string $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getLieuEvent(): ?string
    {
        return $this->lieuEvent;
    }

    public function setLieuEvent(string $lieuEvent): self
    {
        $this->lieuEvent = $lieuEvent;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
