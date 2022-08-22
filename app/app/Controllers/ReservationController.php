<?php

declare(strict_types=1);

namespace App\Controllers;

use App\{Auth\Auth,
    Entities\Location,
    Entities\Reservation,
    Session\Flash,
    Views\View};
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use League\Route\Router;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};

class ReservationController extends Controller
{
    public function __construct(
        protected View $view,
        protected Auth $auth,
        protected Router $router,
        protected Flash $flash,
        protected EntityManager $db
    ) {
    }

    public function index(): ResponseInterface
    {
        $locations = $this->db->getRepository(Location::class)->findAll();
        return $this->view->render(new Response, 'reservation.twig');
    }

    public function store(ServerRequestInterface $request): ResponseInterface
    {
        $data = $this->validateReservation($request);

        $this->createReservation($data);

        return redirect($this->router->getNamedRoute('home')->getPath());
    }

    protected function createReservation(array $data): Reservation
    {
        $reservation = new Reservation();
        $location = $this->db->getRepository(Location::class)->find($data['location']);
        $reservation->fill([
            'title' => $data['title'],
            'user' => $this->auth->user(),
            'date' => \DateTime::createFromFormat('Y-m-d', $data['date']),
            'time' => \DateTime::createFromFormat('H:i', $data['time']),
            'location' => $location
        ]);

        $this->db->persist($reservation);
        $this->db->flush();
        return $reservation;
    }

    private function validateReservation(ServerRequestInterface $request): array
    {
        return $this->validate($request, [
            'title' => ['required'],
            'date' => ['required'],
            'time' => ['required']
        ]);
    }

}