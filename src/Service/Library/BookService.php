<?php

declare(strict_types=1);

namespace App\Service\Library;

use App\Dto\Library\Book\CreateRequestDto;
use App\Entity\Library\Book;
use App\Repository\Library\AuthorRepository;
use App\Repository\Library\BookRepository;
use App\Service\UuidGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\Routing\Attribute\Route;

final class BookService
{
    public function __construct(
        private EntityManagerInterface $em,
        private BookRepository $bookRepository,
        private AuthorRepository $authorRepository,
        private UuidGenerator $uuidGenerator,
    ) {
    }

    public function createBook(CreateRequestDto $dto): void
    {
        $author = $this->authorRepository->findById($dto->authorId);
        if (!$author) {
            throw new EntityNotFoundException('Author was not exists.');
        }

        $book = new Book(
            id: $this->uuidGenerator->generate(),
            author: $author,
            title: $dto->title,
            tags: $dto->tags
        );

        $this->em->persist($book);
        $this->em->flush();
    }

    #[Route(path: '/books', name: 'books_list', methods: ['GET'])]
    public function getBooks(): array
    {
        return $this->bookRepository->findAll();
    }

    public function deleteBook(string $id): void
    {
        $book = $this->bookRepository->findById($id);
        if (!$book) {
            throw new EntityNotFoundException('Book was not exists.');
        }

        $book->setIsDeleted(true);
       // $this->em->s($book);
        $this->em->flush();
    }
}