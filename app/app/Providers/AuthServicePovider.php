<?php

declare(strict_types=1);

namespace App\app\Providers;

use App\app\Auth\Auth;
use App\app\Auth\Hashing\Hasher;
use App\app\Session\SessionStore;
use Doctrine\ORM\EntityManager;
use League\Container\ServiceProvider\AbstractServiceProvider;

class AuthServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        $services = [Auth::class];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $container = $this->getContainer();

        $container->addShared(Auth::class, function () use ($container) {
            return new Auth(
                $container->get(EntityManager::class),
                $container->get(Hasher::class),
                $container->get(SessionStore::class),
            );
        });
    }
}