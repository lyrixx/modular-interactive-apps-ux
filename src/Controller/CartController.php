<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\CartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cart")
 */
class CartController extends AbstractController
{
    private BookRepository $bookRepository;
    private CartRepository $repository;

    public function __construct(BookRepository $bookRepository, CartRepository $repository)
    {
        $this->bookRepository = $bookRepository;
        $this->repository = $repository;
    }

    /**
     * @Route("", name="my_cart")
     */
    public function cart(): Response
    {
        return $this->render('cart/view.html.twig', [
            'cart' => $this->repository->getCart(),
        ]);
    }

    /**
     * @Route("/{id}/quantity", name="my_cart_set_quantity")
     */
    public function setQuantity(int $id, Request $request): Response
    {
        if (!$book = $this->bookRepository->getBook($id)) {
            throw $this->createNotFoundException();
        }

        $this->repository->setQuantity($book, $request->query->get('quantity', 1));

        return $this->redirectToRoute('my_cart');
    }

    /**
     * @Route("/{id}/remove", name="my_cart_remove")
     */
    public function remove(int $id): Response
    {
        if (!$book = $this->bookRepository->getBook($id)) {
            throw $this->createNotFoundException();
        }

        $this->repository->removeBook($book);

        return $this->redirectToRoute('my_cart');
    }
}
