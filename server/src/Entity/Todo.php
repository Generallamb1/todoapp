<?php

namespace App\Entity;

use DateTime;
use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
class Todo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    private ?bool $checked = false;

    #[ORM\Column(length: 512)]
    private ?string $todobody = null;

    #[ORM\Column]
    private ?DateTime $createTime = null;

    #[ORM\Column (nullable: true)]
    private ?DateTime $doneTime = null;

    #[ORM\Column(length: 255, nullable:true)]
    #[JoinTable(name:'tagtodo')]
    #[JoinColumn(name: 'todo_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name:'tag_id', referencedColumnName: 'id')]
    #[ManyToMany(targetEntity: Tag::class)]
    private ?string $tags = null;

    function __construct(
        ?string $id, ?bool $checked, ?string $todobody, ?DateTime $createTime, ?string $tags = null
    ){
        $this->id = $id;
        $this->checked = $checked;
        $this->todobody = $todobody;
        $this->createTime = $createTime;
        $this->doneTime = null;
        $this->tags = $tags;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): static
    {
        $this->checked = $checked;

        return $this;
    }

    public function getTodoBody(): ?string
    {
        return $this->todobody;
    }

    public function setTodoBody(string $todobody): static
    {
        $this->todobody = $todobody;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $tags = null): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getCreationTime() : DateTime
    {
        return $this->createTime;
    }

    public function setCreationTime(DateTime $createTime): static
    {
        $this->createTime = $createTime;

        return $this;
    }

    public function getDoneTime() : DateTime
    {
        return $this->doneTime;
    }

    public function setDoneTime(DateTime $doneTime = null): static
    {
        $this->doneTime = $doneTime;

        return $this;
    }

}
