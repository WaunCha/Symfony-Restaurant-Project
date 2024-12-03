<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Youssef $user = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Menu $menu_items = null;

    #[ORM\Column]
    private ?float $total_price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $order_time = null;

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

    public function getMenuItems(): ?Menu
    {
        return $this->menu_items;
    }

    public function setMenuItems(?Menu $menu_items): static
    {
        $this->menu_items = $menu_items;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getOrderTime(): ?\DateTimeInterface
    {
        return $this->order_time;
    }

    public function setOrderTime(\DateTimeInterface $order_time): static
    {
        $this->order_time = $order_time;

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
