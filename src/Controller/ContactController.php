<?php

namespace App\Controller;

use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    public function __construct(
        private readonly HubInterface $hub
    ) {
    }

    #[Route('/contact', name: 'contact_new')]
    public function new(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->add('submit', SubmitType::class, [
            'label' => 'Send',
        ]);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your message has been sent.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/publish', name: 'publish')]
    public function publish(): Response
    {
        $update = new Update(
            '/contacts',
            $this->renderView('contact/new-message.stream.html.twig', [
                'message' => date('Y-m-d H:i:s')
            ])
        );

        $this->hub->publish($update);

        return new Response('published!');
    }

    #[Route('/contacts', name: 'contact_new')]
    public function index(Request $request): Response
    {
        return $this->render('contact/index.html.twig', [
        ]);
    }
}
