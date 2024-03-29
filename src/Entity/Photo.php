<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
#[Vich\Uploadable]
#[ORM\HasLifecycleCallbacks]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]

    private ?string $id = null;
    // #[Assert\Image(mimeTypes: ["image/jpeg"])]
    #[Vich\UploadableField(mapping: 'vehicle_photo', fileNameProperty: 'imageName', size: 'imageSize', mimeType: 'mimeType')]
    #[Assert\Image(mimeTypes: ["image/jpeg"])]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?string $mimeType = null;


    // #[ORM\ManyToOne(inversedBy: 'photos')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?Vehicle $vehicle = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    #[ORM\ManyToOne(inversedBy: 'photos', cascade: ['persist', 'remove'])]
    private ?Services $mainServices = null;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
        $this->createdAt = new \DateTimeImmutable();
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
    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }



    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setMimeType(?string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    // public function getVehicle(): ?Vehicle
    // {
    //     return $this->vehicle;
    // }

    // public function setVehicle(?Vehicle $vehicle): static
    // {
    //     $this->vehicle = $vehicle;

    //     return $this;
    // }

    /**
     * Get the value of imageName
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getMainServices(): ?Services
    {
        return $this->mainServices;
    }

    public function setMainServices(?Services $mainServices): static
    {
        $this->mainServices = $mainServices;

        return $this;
    }
}
