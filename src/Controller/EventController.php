<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{

    #[Route('/events/{id<\d+>}')]
    public function show(int $id, EventRepository $repository): Response
    {
        $event = $repository->find($id);

        if (null === $event) {
            throw new NotFoundHttpException(sprintf('Event with id "%d" does not exist.', $id));
        }

        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }
}