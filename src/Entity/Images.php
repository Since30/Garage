<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $products = null;

    #[ORM\OneToMany(mappedBy: 'imageCar', targetEntity: BuyCars::class, orphanRemoval: true)]
    private Collection $buyCars;

    #[ORM\OneToMany(mappedBy: 'images', targetEntity: SaleCars::class)]
    private Collection $saleCars;

    public function __construct()
    {
        $this->buyCars = new ArrayCollection();
        $this->saleCars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): static
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return Collection<int, BuyCars>
     */
    public function getBuyCars(): Collection
    {
        return $this->buyCars;
    }

    public function addBuyCar(BuyCars $buyCar): static
    {
        if (!$this->buyCars->contains($buyCar)) {
            $this->buyCars->add($buyCar);
            $buyCar->setImageCar($this);
        }

        return $this;
    }

    public function removeBuyCar(BuyCars $buyCar): static
    {
        if ($this->buyCars->removeElement($buyCar)) {
            // set the owning side to null (unless already changed)
            if ($buyCar->getImageCar() === $this) {
                $buyCar->setImageCar(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SaleCars>
     */
    public function getSaleCars(): Collection
    {
        return $this->saleCars;
    }

    public function addSaleCar(SaleCars $saleCar): static
    {
        if (!$this->saleCars->contains($saleCar)) {
            $this->saleCars->add($saleCar);
            $saleCar->setImages($this);
        }

        return $this;
    }

    public function removeSaleCar(SaleCars $saleCar): static
    {
        if ($this->saleCars->removeElement($saleCar)) {
            // set the owning side to null (unless already changed)
            if ($saleCar->getImages() === $this) {
                $saleCar->setImages(null);
            }
        }

        return $this;
    }
}