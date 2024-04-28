<?php

namespace App\Controller;

use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TagController extends AbstractController
{
    #[Route('/tag', name:'tagGet', methods:['GET'])]
    public function getAllTags(EntityManagerInterface $entityManager): JsonResponse
    {
        $repository = $entityManager->getRepository(Tag::class);

        $tags = $repository->findAll();
    
    }

    #[Route('/tag', methods:['POST'])]
    public function createNewTag(EntityManagerInterface $entityManager): JsonResponse
    {
        $repository = $entityManager->getRepository(Tag::class);

        $tag = new Tag();
    
    }

    #[Route('/tag', methods:['DELETE'])]
    public function deleteTag(EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $tag = $entityManager->getRepository(Tag::class)->find($id);

        $entityManager->remove($tag);

        $entityManager->flush();
    
    }

    #[Route('/tag', name: 'app_tag', methods:['PUT'])]
    public function updateTag(EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $repository = $entityManager->getRepository(Tag::class);

    
    }
    
}
