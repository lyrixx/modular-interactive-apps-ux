<?php

namespace App\Twig\Components;

use App\Repository\CartRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('clock')]
final class ClockComponent
{
    use DefaultActionTrait;

    public \DateTimeImmutable $time;

    public function __construct()
    {
        $this->time = new \DateTimeImmutable();
    }


    #[LiveAction]
    public function update()
    {
        $this->time = new \DateTimeImmutable();
    }
}
