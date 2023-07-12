<?php

namespace App\Entity;

use App\Repository\BuyCarsRepository;
use DateInterval;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BuyCarsRepository::class)]
class BuyCars
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
    private ?string $gearboxType = null;

    #[ORM\Column]
    private ?int $door = null;

    #[ORM\Column]
    private ?int $placeNumber = null;

    #[ORM\Column]
    private ?int $km = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?DateInterval $year = null;

    #[ORM\ManyToOne(inversedBy: 'buyCars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Images $imageCar = null;

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

    public function getGearboxType(): ?string
    {
        return $this->gearboxType;
    }

    public function setGearboxType(string $gearboxType): static
    {
        $this->gearboxType = $gearboxType;

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

    public function getYear(): ?DateInterval
    {
        return $this->year;
    }

    public function setYear(DateInterval $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getImageCar(): ?Images
    {
        return $this->imageCar;
    }

    public function setImageCar(?Images $imageCar): static
    {
        $this->imageCar = $imageCar;

        return $this;
    }
}