<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Youssef $user = null;

    #[ORM\Column]
    private ?int $table_number = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $reservation_time = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Youssef
    {
        return $this->user;
    }

    public function setUser(?Youssef $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTableNumber(): ?int
    {
        return $this->table_number;
    }

    public function setTableNumber(int $table_number): static
    {
        $this->table_number = $table_number;

        return $this;
    }

    public function getReservationTime(): ?\DateTimeInterface
    {
        return $this->reservation_time;
    }

    public function setReservationTime(\DateTimeInterface $reservation_time): static
    {
        $this->reservation_time = $reservation_time;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
