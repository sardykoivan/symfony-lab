<?php

declare(strict_types=1);

namespace App\Controller\Library;

use App\Controller\ApiController;
use App\Dto\Library\Book\CreateRequestDto;
use App\Service\Library\BookService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/library', name: 'route_library_')]
final class BookController extends ApiController
{
    public function __construct(
        private BookService $bookService
    ) {
    }

    #[Route(path: '/books', name: 'books_create', methods: ['POST'])]
    public function createBook(CreateRequestDto $dto): JsonResponse
    {
        $this->bookService->createBook($dto);

        return $this->noContent();
    }

    #[Route(path: '/books', name: 'books_list', methods: ['GET'])]
    public function books(): JsonResponse
    {
        return $this->json(
            $this->bookService->getBooks(),
        );
    }

    #[Route(path: '/books/{id}', name: 'books_delete', methods: ['DELETE'])]
    public function deleteBook(string $id): JsonResponse
    {
        $this->bookService->deleteBook($id);

        return $this->noContent();
    }
}
