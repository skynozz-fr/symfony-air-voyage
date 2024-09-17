<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: VolRepository::class)]
class Vol
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroVol = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank]
    #[Assert\Type("\DateTime")]
    private ?\DateTimeInterface $horraireDepart = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $villeDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank]
    #[Assert\Type("\DateTime")]
    private ?\DateTimeInterface $horraireArrivee = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $villeArrivee = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?float $prix = null;

    #[ORM\Column]
    private ?bool $etiquetteReduction = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?int $nombrePlaceAReserver = null;


    public function __construct()
    {
        $this->numeroVol = $this->generateNumeroVol();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroVol(): ?string
    {
        return $this->numeroVol;
    }

    public function setNumeroVol(string $numeroVol): static
    {
        $this->numeroVol = $numeroVol;

        return $this;
    }

    public function getHorraireDepart(): ?\DateTimeInterface
    {
        return $this->horraireDepart;
    }

    public function setHorraireDepart(\DateTimeInterface $horraireDepart): static
    {
        $this->horraireDepart = $horraireDepart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getHorraireArrivee(): ?\DateTimeInterface
    {
        return $this->horraireArrivee;
    }

    public function setHorraireArrivee(\DateTimeInterface $horraireArrivee): static
    {
        $this->horraireArrivee = $horraireArrivee;

        return $this;
    }

    public function getVilleArrivee(): ?string
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(string $villeArrivee): static
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isEtiquetteReduction(): ?bool
    {
        return $this->etiquetteReduction;
    }

    public function setEtiquetteReduction(bool $etiquetteReduction): static
    {
        $this->etiquetteReduction = $etiquetteReduction;

        return $this;
    }

    public function getNombrePlaceAReserver(): ?int
    {
        return $this->nombrePlaceAReserver;
    }

    public function setNombrePlaceAReserver(int $nombrePlaceAReserver): static
    {
        $this->nombrePlaceAReserver = $nombrePlaceAReserver;

        return $this;
    }

    private function generateNumeroVol(): string
    {
        return strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 2)) . rand(1000, 9999);
    }

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        if ($this->horraireDepart && $this->horraireArrivee) {
            if ($this->horraireArrivee <= $this->horraireDepart) {
                $context->buildViolation('L\'horaire d\'arrivée doit être supérieur l\'horaire de départ.')
                    ->atPath('horraireArrivee')
                    ->addViolation();
            }
        }
    }

}
