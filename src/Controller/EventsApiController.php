<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/events')]
class EventsApiController extends AbstractController
{
    #[Route(name: 'events', methods: ['GET'])]
    public function getCollection(EventRepository $repository):Response
    {
//      todo get real events from database
        $events = $repository->findAll();

        return $this->json($events);
    }

    #[Route('/{id<\d+>}', name: 'event', methods: ['GET'])]
    public function get(int $id, EventRepository $repository):Response
    {
        $event = $repository->find($id);

        if (null === $event) {
            throw new NotFoundHttpException(sprintf('Event with id "%d" does not exist.', $id));
        }

        return $this->json($event);
    }
}