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
    ): Response {
        $errors = [];
        if ($request->getMethod() === 'POST') {
            $quizz = $request->request->all();
            $values = array_values($quizz);
            $trueValue = reset($values);

            if (strlen($trueValue) !== 3 || is_numeric($trueValue) === false) {
                $errors[] = 'Veuillez saisir un nombre à 3 chiffres.';
            }
            if (empty($errors)) {
                if ($trueValue === "841") {
                    return $this->redirectToRoute('app_validation');
                } else {
                    $errors[] = 'Faux !';
                }
            }
        }
        $contact = new Contact();
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
            'errors' => $errors,
        ]);
    }
}
