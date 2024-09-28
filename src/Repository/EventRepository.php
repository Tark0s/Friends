<?php

namespace App\Repository;

use App\Model\Event;
use DateTime;
use Psr\Log\LoggerInterface;

class EventRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info("events fetched with success");

        return [
            new Event(
                id: 1,
                name: 'Event 1',
                date: new DateTime(date('Y-m-d')),
                type: 'party',
                color: 'red',
                created_at: new DateTime(),
                updated_at: new DateTime(),
                organiser: 'John Doe',
                guests: [],
                place: 'Place 1',
                description: 'Event 1 description'
            ),
            new Event(
                id: 2,
                name: 'Event 2',
                date: new DateTime(date('Y-m-d', strtotime('+1 day'))),
                type: 'walk',
                color: 'blue',
                created_at: new DateTime(),
                updated_at: new DateTime(),
                organiser: 'Jane Smith',
                guests: [],
                place: 'Place 2',
                description: 'Event 2 description'
            ),
            new Event(
                id: 3,
                name: 'Event 3',
                date: new DateTime(date('Y-m-d', strtotime('+2 days'))),
                type: 'coffee',
                color: 'green',
                created_at: new DateTime(),
                updated_at: new DateTime(),
                organiser: 'Alice Johnson',
                guests: [],
                place: 'Place 3',
                description: 'Event 3 description'
            ),
            new Event(
                id: 4,
                name: 'Event 4',
                date: new DateTime(date('Y-m-d', strtotime('+3 days'))),
                type: 'gym',
                color: 'yellow',
                created_at: new DateTime(),
                updated_at: new DateTime(),
                organiser: 'Bob Brown',
                guests: [],
                place: 'Place 4',
                description: 'Event 4 description'
            ),
        ];
    }

    public function find(int $id): ?Event
    {
        foreach ($this->findAll() as $event) {
            if ($event->getId() === $id) {
                return $event;
            }
        }

        return null;
    }
}