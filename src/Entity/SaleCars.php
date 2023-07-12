<?php

namespace App\Entity;

use App\Repository\SaleCarsRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaleCarsRepository::class)]
class SaleCars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $brand = null;

    #[ORM\Column(length: 10)]
    private ?string $type = null;

    #[ORM\Column(length: 15)]
    private ?string $gearboxtype = null;

    #[ORM\Column]
    private ?int $door = null;

    #[ORM\Column]
    private ?int $placeNumber = null;

    #[ORM\Column]
    private ?int $km = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeImmutable $year;

    #[ORM\ManyToOne(inversedBy: 'saleCars')]
    private ?Images $images = null;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGearboxtype(): ?string
    {
        return $this->gearboxtype;
    }

    public function setGearboxtype(string $gearboxtype): static
    {
        $this->gearboxtype = $gearboxtype;

        return $this;
    }

    public function getDoor(): ?int
    {
        return $this->door;
    }

    public function setDoor(int $door): static
    {
        $this->door = $door;

        return $this;
    }

    public function getPlaceNumber(): ?int
    {
        return $this->placeNumber;
    }

    public function setPlaceNumber(int $placeNumber): static
    {
        $this->placeNumber = $placeNumber;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getYear(): ?DateTimeImmutable
    {
        return $this->year;
    }

    public function setYear(?DateTimeImmutable $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getImages(): ?Images
    {
        return $this->images;
    }

    public function setImages(?Images $images): static
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return 
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param  $createdAt 
     * @return self
     */
    public function setCreatedAt(?DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}