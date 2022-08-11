<?php

declare(strict_types=1);

namespace App\app\Controllers\Auth;

use App\app\Auth\Auth;
use App\app\Controllers\Controller;
use App\app\Session\Flash;
use App\app\Views\View;
use Laminas\Diactoros\Response;
use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends Controller
{
    public function __construct(
        protected View $view,
        protected Auth $auth,
        protected Router $router,
        protected Flash $flash
    ) {
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response;

        return $this->view->render($response, 'auth/login.twig');
    }

    public function store(ServerRequestInterface $request)
    {
        $data = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $attempt = $this->auth->attempt($data['email'], $data['password']);

        if (!$attempt) {
            $this->flash->now('error', 'Could not sign you in with those details');

            return redirect($request->getUri()->getPath());
        }

        return redirect($this->router->getNamedRoute('home')->getPath());
    }
}