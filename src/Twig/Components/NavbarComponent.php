<?php

namespace App\Twig\Components;

use App\Repository\TagsRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('navbar')]
final class NavbarComponent
{
    public function __construct(
        private TagsRepository $tagsRepository
    ) {
    }

    public function getTags(): array
    {
        return $this->tagsRepository->findBy([], ['language' => 'ASC']);
    }
}
