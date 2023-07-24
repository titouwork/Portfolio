<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\ContentRepository;
use App\Repository\ProjectsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
    ContentRepository $contentRepo, 
    ProjectsRepository $projectsRepo,
    ContactRepository $contactRepository,
    Request $request
    ): Response
    {
        $contact= new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setDate(new DateTimeImmutable('now'));
            $contactRepository->save($contact, true);
            return $this->redirectToRoute('app_validation');
        }
        return $this->render('home/index.html.twig', [
            'content' => $contentRepo->findAll(),
            'projects' => $projectsRepo->findAll(),
            'contactForm' => $form->createView(),
        ]);
    }
}
