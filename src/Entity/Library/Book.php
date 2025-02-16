<?php

declare(strict_types=1);

namespace App\Entity\Library;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('library_books')]
class Book
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Author::class)]
    private Author $author;

    #[ORM\Column(type: 'string', length: 32)]
    private string $title;

    #[ORM\Column(type: 'json')]
    private array $tags;

    #[ORM\Column(type: 'boolean')]
    private bool $isDeleted;

    public function __construct(
        string $id,
        Author $author,
        string $title,
        array $tags,
        ?bool $isDeleted = false,
    ) {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->tags = $tags;
        $this->isDeleted = $isDeleted;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}
