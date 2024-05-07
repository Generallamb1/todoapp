<?php

namespace App\Controller;

use App\Entity\Todo;
use Psr\Log\LoggerInterface;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
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

    #[Route('/todo', name: 'getall', methods: ['GET'], format: 'json')]
    public function getAllNotes(EntityManagerInterface $entityManager): JsonResponse
    {
        $repository = $entityManager->getRepository(Todo::class);
        $todo = $repository->findAll();

        return $this->json($todo);
    }

    #[Route('/todo/{id}', name: 'tododelete', methods:['DELETE'])]
    public function deleteNoteById(
        EntityManagerInterface $entityManager,
         $id,
         LoggerInterface $logger
    ): Response
    {
        $todo = $entityManager->getRepository(Todo::class)->find($id);
        $logger->info($todo->getTodoBody());
        $entityManager->remove($todo);
        $entityManager->flush();

        return new Response(Response::HTTP_OK);
    }

    #[Route('/todo', name: 'todo1', methods:['POST'])]
    public function createNote(EntityManagerInterface $entityManager): Response
    {
        $request = Request::createFromGlobals();
        $entityManager->persist(
            new Todo(
                Uuid::v4(),
                $request->getPayload()->get('checked'),
                $request->getPayload()->get('todoBody'),
                new \DateTime,
                $request->getPayload()->get('tags')
            )
        );
        $entityManager->flush();

        return new Response(Response::HTTP_OK);
    }

    #[Route('/todo', name: 'app_todo', methods:['PUT'])]
    public function updateNote(EntityManagerInterface $entityManager): Response
    {
        $request = Request::createFromGlobals();
        $content = json_decode($request->getContent());

        $todo = $entityManager->getRepository(Todo::class)->find($content->id);
        
        ($content->checked) ? $todo->setDoneTime(new \DateTime('')) : $todo->setDoneTime(null);
        ($content->tags) ? $todo->setTags($content->tags) : null;
        ($content->todoBody) ? $todo->setTodoBody($content->todoBody) : null;
        $todo->setChecked($content->checked);

        $entityManager->persist($todo);
        $entityManager->flush();

        return new Response(Response::HTTP_OK);
    }

}
