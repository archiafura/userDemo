<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TableaudeborduserRepository")
 */
class Tableaudeborduser
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
    private $nomlivraison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomfacturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenominfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nominfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomlivraison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomfacturation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $livraison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cplivraison;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villelivraison;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cpfacturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villefacturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailinfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpinfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmmdpinfos;

    public function getId()
    {
        return $this->id;
    }

    public function getNomlivraison(): ?string
    {
        return $this->nomlivraison;
    }

    public function setNomlivraison(string $nomlivraison): self
    {
        $this->nomlivraison = $nomlivraison;

        return $this;
    }

    public function getNomfacturation(): ?string
    {
        return $this->nomfacturation;
    }

    public function setNomfacturation(string $nomfacturation): self
    {
        $this->nomfacturation = $nomfacturation;

        return $this;
    }

    public function getPrenominfos(): ?string
    {
        return $this->prenominfos;
    }

    public function setPrenominfos(string $prenominfos): self
    {
        $this->prenominfos = $prenominfos;

        return $this;
    }

    public function getNominfos(): ?string
    {
        return $this->nominfos;
    }

    public function setNominfos(string $nominfos): self
    {
        $this->nominfos = $nominfos;

        return $this;
    }

    public function getPrenomlivraison(): ?string
    {
        return $this->prenomlivraison;
    }

    public function setPrenomlivraison(string $prenomlivraison): self
    {
        $this->prenomlivraison = $prenomlivraison;

        return $this;
    }

    public function getPrenomfacturation(): ?string
    {
        return $this->prenomfacturation;
    }

    public function setPrenomfacturation(string $prenomfacturation): self
    {
        $this->prenomfacturation = $prenomfacturation;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getFacturation(): ?string
    {
        return $this->facturation;
    }

    public function setFacturation(string $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function getCplivraison(): ?string
    {
        return $this->cplivraison;
    }

    public function setCplivraison(?string $cplivraison): self
    {
        $this->cplivraison = $cplivraison;

        return $this;
    }

    public function getVillelivraison(): ?string
    {
        return $this->villelivraison;
    }

    public function setVillelivraison(?string $villelivraison): self
    {
        $this->villelivraison = $villelivraison;

        return $this;
    }

    public function getCpfacturation(): ?string
    {
        return $this->cpfacturation;
    }

    public function setCpfacturation(?string $cpfacturation): self
    {
        $this->cpfacturation = $cpfacturation;

        return $this;
    }

    public function getVillefacturation(): ?string
    {
        return $this->villefacturation;
    }

    public function setVillefacturation(?string $villefacturation): self
    {
        $this->villefacturation = $villefacturation;

        return $this;
    }

    public function getEmailinfos(): ?string
    {
        return $this->emailinfos;
    }

    public function setEmailinfos(string $emailinfos): self
    {
        $this->emailinfos = $emailinfos;

        return $this;
    }

    public function getMdpinfos(): ?string
    {
        return $this->mdpinfos;
    }

    public function setMdpinfos(string $mdpinfos): self
    {
        $this->mdpinfos = $mdpinfos;

        return $this;
    }

    public function getConfirmmdpinfos(): ?string
    {
        return $this->confirmmdpinfos;
    }

    public function setConfirmmdpinfos(string $confirmmdpinfos): self
    {
        $this->confirmmdpinfos = $confirmmdpinfos;

        return $this;
    }
}
