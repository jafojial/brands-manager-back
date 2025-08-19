<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Controller\TopListController;
use App\Repository\TopListRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;

#[ORM\Entity(repositoryClass: TopListRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new Post(),
    new Get(
        name: 'brand-top-list',
        uriTemplate: '/toplist',
        controller: TopListController::class,
        read: false
    )
])]
class TopList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $countryCode = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(referencedColumnName: 'brand_id', nullable: false)]
    private ?Brand $brand = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): static
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }
}
