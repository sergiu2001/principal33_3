<?php
declare(strict_types=1);

namespace App\app\Controllers;

use App\app\Entities\User;
use App\app\Views\View;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function __construct(
        protected View $view,
        protected EntityManager $db
    ) {
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response;

        $user = $this->db->getRepository(User::class)->findOneBy([]);

//        $user->name = 'John Doe';

        return $this->view->render($response, 'home.twig', [
            'user' => $user,
        ]);
    }
}