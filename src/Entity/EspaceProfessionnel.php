<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EspaceProfessionnelRepository")
 */
class EspaceProfessionnel
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
    private $typeProduit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dureeDispo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horaireDispo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conseilUtilisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgProduit;

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

    public function getId()
    {
        return $this->id;
    }

    public function getTypeProduit(): ?string
    {
        return $this->typeProduit;
    }

    public function setTypeProduit(string $typeProduit): self
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    public function getDureeDispo(): ?string
    {
        return $this->dureeDispo;
    }

    public function setDureeDispo(string $dureeDispo): self
    {
        $this->dureeDispo = $dureeDispo;

        return $this;
    }

    public function getHoraireDispo(): ?string
    {
        return $this->horaireDispo;
    }

    public function setHoraireDispo(string $horaireDispo): self
    {
        $this->horaireDispo = $horaireDispo;

        return $this;
    }

    public function getConseilUtilisation(): ?string
    {
        return $this->conseilUtilisation;
    }

    public function setConseilUtilisation(string $conseilUtilisation): self
    {
        $this->conseilUtilisation = $conseilUtilisation;

        return $this;
    }

    public function getImgProduit(): ?string
    {
        return $this->imgProduit;
    }

    public function setImgProduit(string $imgProduit): self
    {
        $this->imgProduit = $imgProduit;

        return $this;
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
}
