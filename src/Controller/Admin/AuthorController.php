<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/author')]
class AuthorController extends AbstractController
{
    #[IsGranted('IS_AUTHENTICATED')]
    #[Route('', name: 'app_admin_author', methods: ['GET'])]
    public function index(AuthorRepository $repository): Response
    {
        $authors = $repository->findAll();

        return $this->render('admin/author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
        ]);
    }

    #[Route('/new', name: 'app_admin_author_new', methods: ['GET', 'POST'])]
    #[Route('/{id}/edit', name: 'app_admin_author_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function new(?Author $author, Request $request, EntityManagerInterface $manager): Response
    {
        if($author === null){
            $this->denyAccessUnlessGranted(attribute:'ROLE_ADMIN');
        }

        $author ??= new Author();
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($author);
            $manager->flush();

            return $this->redirectToRoute(route:'app_admin_author');
        }

        return $this->render('admin/author/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}]', name:'app_admin_author_show', requirements:['id'=>'\d+'], methods:['GET'])]
    public function show(?Author $author): Response
    {
        return $this->render('admin/author/show.html.twig', [
            'author' => $author,
        ]);
    }
}
