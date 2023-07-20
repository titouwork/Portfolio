<?php

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $content = new Content();
        $content ->setPhoto('build/images/photoperso.jpg');
        $content ->setInformation('Prénom: Titouan
        Nom: Lahely
        Numéro de téléphone: 06 47 93 77 **
        Adresse: Toulouse 31500');
        $content->setContent("Actuellement en reconversion professionnelle, j'ai acquis une solide expérience dans le commerce, plus spécifiquement dans le secteur du sport. Cependant, ma passion pour les nouvelles technologies et mon désir d'évoluer dans le domaine du développement web m'ont amené à suivre une formation intensive de 5 mois à la Wild Code School. Au cours de cette formation, j'ai développé des compétences en développement web, design d'interface utilisateur et résolution de problèmes complexes. Dans mes expériences professionnelles antérieures, j'ai eu l'occasion d'exercer des responsabilités clés telles que l'accueil, le conseil, le recrutement et la formation des équipes, ainsi que la gestion des plannings. De plus, j'ai été impliqué dans la mise en place d'événements marketing nationaux et d'animations club. Ces expériences m'ont permis de développer des compétences transférables, telles que le travail d'équipe, la communication efficace avec divers interlocuteurs et la gestion de projets dans un environnement dynamique. Ma reconversion professionnelle dans le domaine du développement web est motivée par ma passion pour les nouvelles technologies et mon désir d'approfondir mes connaissances dans les technologies JavaScript, React et Node.js. Je suis conscient que mon expérience antérieure dans le commerce peut apporter une perspective unique et une approche orientée client au développement web. En rejoignant une entreprise en alternance, mon objectif est de continuer à me perfectionner dans les technologies JavaScript, React et Node.js, en mettant en pratique mes compétences et en contribuant au succès de l'entreprise. Je suis prêt à m'investir pleinement dans les projets qui me seront confiés, à apprendre rapidement et à apporter une réelle valeur ajoutée grâce à ma polyvalence, ma créativité et ma volonté constante de me surpasser.");
        $manager->persist($content);
        $manager->flush();
    }
}
