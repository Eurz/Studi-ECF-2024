<?php

namespace App\Entity;

use App\Repository\VehiclesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: VehiclesRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]

class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    private ?string $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le titre est requis')]
    private ?string $brandName = null;


    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le modèle est requis')]
    private ?string $model = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'createdAt')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'updatedAt')]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'La date de mise en circulation est obligatoire')]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(nullable: true)]
    private ?int $mileage = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    private ?int $fiscalPower = null;

    #[ORM\Column(nullable: true)]
    private ?int $power = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $motorization = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1, nullable: true)]
    private ?string $consumption = null;

    // #[ORM\Column(nullable: true)]
    // #[Assert\PositiveOrZero()]
    // private ?int $emissionRate = null;

    // #[ORM\Column(length: 1, nullable: true)]
    // private ?string $energyClass = null;

    // #[ORM\Column(nullable: true)]
    // #[Assert\PositiveOrZero()]
    // private ?int $length = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $width = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $height = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $unloadedWeight = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $totalWeight = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxSpeed = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?int $numberOfDoors = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $engineDisplacement = null;

    // #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: Photo::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    // private Collection $photos;

    #[ORM\ManyToMany(targetEntity: Equipments::class)]
    private Collection $equipments;

    #[ORM\ManyToMany(targetEntity: Equipments::class)]
    #[JoinTable(name: 'vehicle_options')]
    private Collection $options;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Photo $featuredImage = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        // $this->photos = new ArrayCollection();
        $this->equipments = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

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


    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    // public function getTitle(): ?string
    // {
    //     return $this->title;
    // }

    // public function setTitle(?string $title): static
    // {
    //     $this->title = $title;

    //     return $this;
    // }

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


    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

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
        return $this->fiscalPower;
    }

    public function setFiscalPower(int $fiscalPower): static
    {
        $this->fiscalPower = $fiscalPower;

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

    // public function getEmissionRate(): ?int
    // {
    //     return $this->emissionRate;
    // }

    // public function setEmissionRate(?int $emissionRate): static
    // {
    //     $this->emissionRate = $emissionRate;

    //     return $this;
    // }

    // public function getEnergyClass(): ?string
    // {
    //     return $this->energyClass;
    // }

    // public function setEnergyClass(?string $energyClass): static
    // {
    //     $this->energyClass = $energyClass;

    //     return $this;
    // }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    // public function getLength(): ?int
    // {
    //     return $this->length;
    // }

    // public function setLength(?int $length): static
    // {
    //     $this->length = $length;

    //     return $this;
    // }

    // public function getWidth(): ?int
    // {
    //     return $this->width;
    // }

    // public function setWidth(?int $width): static
    // {
    //     $this->width = $width;

    //     return $this;
    // }

    // public function getHeight(): ?int
    // {
    //     return $this->height;
    // }

    // public function setHeight(?int $height): static
    // {
    //     $this->height = $height;

    //     return $this;
    // }

    // public function getUnloadedWeight(): ?int
    // {
    //     return $this->unloadedWeight;
    // }

    // public function setUnloadedWeight(?int $unloadedWeight): static
    // {
    //     $this->unloadedWeight = $unloadedWeight;

    //     return $this;
    // }

    // public function getTotalWeight(): ?int
    // {
    //     return $this->totalWeight;
    // }

    // public function setTotalWeight(?int $totalWeight): static
    // {
    //     $this->totalWeight = $totalWeight;

    //     return $this;
    // }

    public function getMaxSpeed(): ?int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(?int $maxSpeed): static
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getNumberOfDoors(): ?int
    {
        return $this->numberOfDoors;
    }

    public function setNumberOfDoors(?int $numberOfDoors): static
    {
        $this->numberOfDoors = $numberOfDoors;

        return $this;
    }

    public function getEngineDisplacement(): ?int
    {
        return $this->engineDisplacement;
    }

    public function setEngineDisplacement(?int $engineDisplacement): static
    {
        $this->engineDisplacement = $engineDisplacement;

        return $this;
    }

    // /**
    //  * @return Collection<int, Photo>
    //  */
    // public function getPhotos(): Collection
    // {
    //     return $this->photos;
    // }

    // public function addPhoto(Photo $photo): static
    // {
    //     if (!$this->photos->contains($photo)) {
    //         $this->photos->add($photo);
    //         $photo->setVehicle($this);
    //     }

    //     return $this;
    // }

    // public function removePhoto(Photo $photo): static
    // {
    //     if ($this->photos->removeElement($photo)) {
    //         // set the owning side to null (unless already changed)
    //         if ($photo->getVehicle() === $this) {
    //             $photo->setVehicle(null);
    //         }
    //     }

    //     return $this;
    // }

    public function toArray(): array
    {
        return ['id' => $this->id, 'brandName' => $this->brandName];
    }

    /**
     * @return Collection<int, Equipments>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipments $equipment): static
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments->add($equipment);
        }

        return $this;
    }

    public function removeEquipment(Equipments $equipment): static
    {
        $this->equipments->removeElement($equipment);

        return $this;
    }

    /**
     * @return Collection<int, Equipments>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Equipments $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
        }

        return $this;
    }

    public function removeOption(Equipments $option): static
    {
        $this->options->removeElement($option);

        return $this;
    }

    public function getFeaturedImage(): ?Photo
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(Photo $featuredImage): static
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }
}
