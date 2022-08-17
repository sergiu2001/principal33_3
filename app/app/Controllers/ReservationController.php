<?php

declare(strict_types=1);

namespace App\Controllers;

use App\{Auth\Auth,
    Auth\Hashing\Hasher,
    Controllers\Controller,
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
        protected Hasher $hash,
        protected EntityManager $db
    ) {
    }

    public function index(): ResponseInterface
    {
        return $this->view->render(new Response, 'reservation.twig');
    }

    public function store(ServerRequestInterface $request): ResponseInterface
    {

        $data = $this->validateReservation($request);

        $this->createReservation($data);

        $this->auth->attempt($data['email'], $data['password']);

        return redirect($this->router->getNamedRoute('home')->getPath());
    }

    protected function createReservation(array $data): Reservation
    {
        $reservation = new Reservation();

        $reservation->fill([
            'title' => $data['title'],
            'user_id' => $data['user_id'],
            'date' => $data['date'],
            'time' => $data['time'],
            'location' => $data['location']
        ]);

        $this->db->persist($reservation);
        $this->db->flush();

        return $reservation;
    }

    private function validateReservation(ServerRequestInterface $request): array
    {
        return $this->validate($request, [
            'title' => ['required'],
            'user_id' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'location' => ['required']
        ]);
    }

}