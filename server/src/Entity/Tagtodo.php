<?php

namespace App\Entity;

use App\Repository\TagtodoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagtodoRepository::class)]
class Tagtodo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tag_id = null;

    #[ORM\Column(length: 255)]
    private ?string $todo_id = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTagId(): ?string
    {
        return $this->tag_id;
    }

    public function setTagId(string $tag_id): static
    {
        $this->tag_id = $tag_id;

        return $this;
    }

    public function getTodoId(): ?string
    {
        return $this->todo_id;
    }

    public function setTodoId(string $todo_id): static
    {
        $this->todo_id = $todo_id;

        return $this;
    }
}
