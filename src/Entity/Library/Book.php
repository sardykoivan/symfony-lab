<?php

declare(strict_types=1);

namespace App\Entity\Library;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('library_books')]
final class Book
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

    public function __construct(string $id, Author $author, string $title, array $tags)
    {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->tags = $tags;
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
}