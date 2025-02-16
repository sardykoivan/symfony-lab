<?php

declare(strict_types=1);

namespace App\Service\Library;

use App\Entity\Library\Author;
use App\Exception\Http\EntityExistsException;
use App\Repository\Library\AuthorRepository;
use App\Service\UuidGenerator;
use App\Dto\Library\Author\CreateRequestDto;
use Doctrine\ORM\EntityManagerInterface;

final class AuthorService
{
    public function __construct(
        private EntityManagerInterface $em,
        private AuthorRepository $authorRepository,
        private UuidGenerator $uuidGenerator,
    ) {
    }

    public function createAuthor(CreateRequestDto $dto): void
    {
        if ($this->authorRepository->findByCode($dto->code)) {
            throw new EntityExistsException(
                404,
                'Author already exists.'
            );
        }

        $author = new Author(
            id : $this->uuidGenerator->generate(),
            code: mb_strtoupper($dto->code),
            fullName: $dto->fullName,
            yearOfBirth: $dto->yearOfBirth,
        );

        $this->em->persist($author);
        $this->em->flush();
    }

    public function getAuthors(): array
    {
        return $this->authorRepository->findAll();
    }
}