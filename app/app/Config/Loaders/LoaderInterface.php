<?php

declare(strict_types=1);

namespace App\app\Config\Loaders;

interface LoaderInterface
{
    public function parse(): array;
}