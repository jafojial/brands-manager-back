<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BrandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
#[ApiResource]
class Brand
{
     #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $brand_id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand_name = null;

    #[ORM\Column(length: 255)]
    private ?string $brand_image = null;

    #[ORM\Column]
    private ?int $rating = null;

    public function getBrandId(): ?int
    {
        return $this->brand_id;
    }

    public function getBrandName(): ?string
    {
        return $this->brand_name;
    }

    public function setBrandName(string $brand_name): static
    {
        $this->brand_name = $brand_name;

        return $this;
    }

    public function getBrandImage(): ?string
    {
        return $this->brand_image;
    }

    public function setBrandImage(string $brand_image): static
    {
        $this->brand_image = $brand_image;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }
    
}
