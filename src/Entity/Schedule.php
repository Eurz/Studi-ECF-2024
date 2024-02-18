<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 20)]
    // private ?string $dayName = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $morningStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $morningEnd = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $afternoonStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $afternoonEnd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getDayName(): ?string
    // {
    //     return $this->dayName;
    // }

    // public function setDayName(string $dayName): static
    // {
    //     $this->dayName = $dayName;

    //     return $this;
    // }

    public function getMorningStart(): ?\DateTimeInterface
    {
        return $this->morningStart;
    }

    public function setMorningStart(\DateTimeInterface $morningStart): static
    {
        $this->morningStart = $morningStart;

        return $this;
    }

    public function getMorningEnd(): ?\DateTimeInterface
    {
        return $this->morningEnd;
    }

    public function setMorningEnd(?\DateTimeInterface $morningEnd): static
    {
        $this->morningEnd = $morningEnd;

        return $this;
    }

    public function getAfternoonStart(): ?\DateTimeInterface
    {
        return $this->afternoonStart;
    }

    public function setAfternoonStart(?\DateTimeInterface $afternoonStart): static
    {
        $this->afternoonStart = $afternoonStart;

        return $this;
    }

    public function getAfternoonEnd(): ?\DateTimeInterface
    {
        return $this->afternoonEnd;
    }

    public function setAfternoonEnd(\DateTimeInterface $afternoonEnd): static
    {
        $this->afternoonEnd = $afternoonEnd;

        return $this;
    }
}
