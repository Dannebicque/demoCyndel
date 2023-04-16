<?php

namespace App\Components;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('random_number')]

class RandomNumberComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $keyword = '';

//    public function __construct(private BlogRepository $blogRepository)
//    {
//    }
//
//    public function getRandomNumber(): int
//    {
//        return $this->blogRepository->findBy(['titre' => '%'.$this->keyword.'%']);
//    }
}
