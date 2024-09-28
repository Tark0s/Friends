<?php

namespace App\Model;

use \DateTime;

class Event
{

    public function __construct(
        private int $id,
        private string $name,
        private DateTime $date,
        private string $type,
        private string $color,
        private DateTime $created_at,
        private DateTime $updated_at,
        private string $organiser,
        private array $guests,
        private string $place,
        private string $description
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    public function getOrganiser(): string
    {
        return $this->organiser;
    }

    public function getGuests(): array
    {
        return $this->guests;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}