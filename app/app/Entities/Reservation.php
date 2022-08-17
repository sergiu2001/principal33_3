<?php
declare(strict_types=1);

namespace App\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('reservations')]
class Reservation extends BaseEntity
{
    #[ORM\Column(name: 'title', type: Types::STRING, length: 255, nullable: false)]
    protected string $title;

    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    protected int $id;

    #[ORM\Column(name:"user_id", type: Types::INTEGER)]
    protected int $user_id;

    #[ORM\Column(name: 'date', type: Types::DATE_MUTABLE, nullable: false)]
    protected string $date;

    #[ORM\Column(name: 'time', type: Types::TIME_MUTABLE, nullable: false)]
    protected string $time;

    #[ORM\Column(name: 'location', type: Types::STRING, length: 255, nullable: false)]
    protected string $location;
}