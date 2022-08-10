<?php

declare(strict_types=1);

namespace App\app\Controllers\Auth;

use App\app\Controllers\Controller;
use App\app\Views\View;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends Controller
{
    public function __construct(protected View $view)
    {
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response;

        return $this->view->render($response, 'auth/login.twig');
    }

    public function store(ServerRequestInterface $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    }
}