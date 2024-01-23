<?php

namespace App\Entity;

use App\Repository\VehiclesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiclesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Vehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    private ?string $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $brandName = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $type = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $model = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $releaseDate = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]

    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $featured_image = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $mileage = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero()]
    private ?int $fiscal_power = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $power = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $motorization = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1, nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?string $consumption = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $emission_rate = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $energy_class = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $length = null;

    #[ORM\Column(nullable: true)]
    private ?int $width = null;

    #[ORM\Column(nullable: true)]
    private ?int $height = null;

    #[ORM\Column(nullable: true)]
    private ?int $unloaded_weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $total_weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $max_speed = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $number_of_doors = null;


    #[ORM\PrePersist]
    public function prePersist()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): static
    {
        $this->brandName = $brandName;

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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeImmutable
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeImmutable $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featured_image;
    }

    public function setFeaturedImage(string $featured_image): static
    {
        $this->featured_image = $featured_image;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscal_power;
    }

    public function setFiscalPower(int $fiscal_power): static
    {
        $this->fiscal_power = $fiscal_power;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getMotorization(): ?string
    {
        return $this->motorization;
    }

    public function setMotorization(?string $motorization): static
    {
        $this->motorization = $motorization;

        return $this;
    }

    public function getConsumption(): ?string
    {
        return $this->consumption;
    }

    public function setConsumption(?string $consumption): static
    {
        $this->consumption = $consumption;

        return $this;
    }

    public function getEmissionRate(): ?int
    {
        return $this->emission_rate;
    }

    public function setEmissionRate(?int $emission_rate): static
    {
        $this->emission_rate = $emission_rate;

        return $this;
    }

    public function getEnergyClass(): ?string
    {
        return $this->energy_class;
    }

    public function setEnergyClass(?string $energy_class): static
    {
        $this->energy_class = $energy_class;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getUnloadedWeight(): ?int
    {
        return $this->unloaded_weight;
    }

    public function setUnloadedWeight(?int $unloaded_weight): static
    {
        $this->unloaded_weight = $unloaded_weight;

        return $this;
    }

    public function getTotalWeight(): ?int
    {
        return $this->total_weight;
    }

    public function setTotalWeight(?int $total_weight): static
    {
        $this->total_weight = $total_weight;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->max_speed;
    }

    public function setMaxSpeed(?int $max_speed): static
    {
        $this->max_speed = $max_speed;

        return $this;
    }

    public function getNumberOfDoors(): ?int
    {
        return $this->number_of_doors;
    }

    public function setNumberOfDoors(?int $number_of_doors): static
    {
        $this->number_of_doors = $number_of_doors;

        return $this;
    }
}
