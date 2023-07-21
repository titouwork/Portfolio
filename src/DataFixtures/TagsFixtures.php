<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture
{
    public const TAGS = [
        "HTML/CSS",
        "PHP/Twig",
        "Symfony",
        "JavaScript",
        "REACT",
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TAGS as $index => $tag) {
            $tags = new Tags();
            $tags->setLanguage($tag);
            $manager->persist($tags);
            $this->addReference('tag_' . $index, $tags);
        }

        $manager->flush();
    }
}
