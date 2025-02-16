<?php

declare(strict_types=1);

namespace App\Controller\Library;

use App\Controller\ApiController;
use App\Service\Library\AuthorService;
use App\Dto\Library\Author\CreateRequestDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/library', name: 'route_library_authors_')]
final class AuthorController extends ApiController
{
    public function __construct(
        private AuthorService $authorService,
    ) {
    }

    #[Route(path: '/authors', name: 'create', methods: ['POST'])]
    public function createAuthor(CreateRequestDto $dto): JsonResponse
    {
        $this->authorService->createAuthor($dto);

        return $this->noContent();
    }

    #[Route(path: '/authors', name: 'list', methods: ['GET'])]
    public function authors(): JsonResponse
    {
        return $this->json(
            $this->authorService->getAuthors()
        );
    }
}