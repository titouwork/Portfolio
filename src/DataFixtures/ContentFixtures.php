<?php

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Twig\Environment;

class ContentFixtures extends Fixture
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function load(ObjectManager $manager): void
    {
        $contentTemplate = $this->twig->render('fixtures/content_template.html.twig');

        $content = new Content();
        $content->setPhoto('build/images/photoperso.jpg');
        $content->setInformation('Prénom: Titouan
        Nom: Lahely
        Numéro de téléphone: 06 47 93 77 **
        Adresse: Toulouse 31500');
        $content->setContent($contentTemplate);

        $manager->persist($content);
        $manager->flush();
    }
}
