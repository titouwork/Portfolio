<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectsFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        ["https://wildcodeschool.github.io/2023-03-remote-fr-php-projet-iron-man/index.html",
        "Site statique conçu avec HTML/CSS pour présenter un portfolio personnel.",
        0],
        ["https://eb-conception.remote-fr-1.wilders.dev",
        "Application web dynamique développée avec Twig/PHP pour gérer des tâches et projets.",
        1],
        ["https://space-marines.remote-fr-1.wilders.dev",
        "Projet en PHP réalisé en seulement 2 jours pour répondre à un défi spécifique.",
        1],
        ["https://la-ligne-bleue.remote-fr-1.wilders.dev",
        "Application Symfony pour créer et gérer des tutorials et utilisateurs.",
        2]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as list($value1, $value2, $value3)) {
            $project = new Projects();
            $project->setUrl($value1);
            $project->setDescription($value2);
            $tag = $this->getReference('tag_' . $value3);
            $project->addTag($tag);
            $manager->persist($project);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            TagsFixtures::class,
        ];
    }
}
