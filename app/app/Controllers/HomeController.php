<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Entities\Reservation;
use App\Views\View;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function __construct(
        protected View          $view,
        protected EntityManager $db
    )
    {
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        //dd($request);
        $reservations = $this->db->getRepository(Reservation::class)->findAll();
        $this->deleteOldRes();
        return $this->view->render(new Response, 'home.twig', ['reservations' => $reservations]);
    }

    private function deleteOldRes()
    {
        $data = $this->db->getRepository(reservation::class)->findAll();
        foreach ($data as $res) {
            if ($res->date < new \DateTime('today'))
                $this->db->remove($res);
        }
        $this->db->flush();
    }
}