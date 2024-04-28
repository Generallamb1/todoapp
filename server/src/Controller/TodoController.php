<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends AbstractController
{
    #[Route('/todo/{id}', name: 'app_todo', methods:['GET'])]
    public function getNoteById(EntityManagerInterface $entityManager , $id): JsonResponse
    {
        $repository = $entityManager->getRepository(Todo::class);

        $todo = $repository->find($id);
    
    }

    #[Route('/todo/{tag}', name: 'app_todo', methods:['GET'])]
    public function getNoteByTag(EntityManagerInterface $entityManager , $tag): JsonResponse
    {
        $repository = $entityManager->getRepository(Todo::class);

        $todo = $repository->findBy(['tags' => $tag]);
        

    }

    #[Route('/todo', name: 'app_todo', methods: ['GET'])]
    public function getAllNotes(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Todo::class);

        $todo = $repository->findAll();

        return new Response('Check out this great product: '.$todo);

    }

    #[Route('/todo', name: 'app_todo', methods:['DELETE'])]
    public function deleteNoteById(EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $todo = $entityManager->getRepository(Todo::class)->find($id);

        $entityManager->remove($todo);

        $entityManager->flush();

    }

    // #[Route('/todo', name: 'app_todo', methods:['POST'])]
    // public function createNote(EntityManagerInterface $entityManager, $id): JsonResponse
    // {
    //     $repository = $entityManager->getRepository(Todo::class);
        
    // }

    // #[Route('/todo', name: 'app_todo', methods:['PUT'])]
    // public function updateNode(EntityManagerInterface $entityManager, $id): JsonResponse
    // {
        
    // }

    #[Route('/todonew', name: 'app_todo')]
    public function createBasicNote(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Todo::class);
        
        $todo = new Todo();

        $todo->setId(Uuid::v4());
        $todo->setTags();
        $todo->setChecked(true);
        $todo->setCreationTime(new \DateTime());
        $todo->setDoneTime(null);
        $todo->setTodobody("Добавить новую фичу!");
        
        $entityManager->persist($todo);

        $entityManager->flush();

        return new Response('Создана новая заметка с id'.$todo->getId());
    }

}
