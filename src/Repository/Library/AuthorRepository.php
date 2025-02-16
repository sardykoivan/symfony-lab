<?php

declare(strict_types=1);

namespace App\Repository\Library;

use App\Entity\Library\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function findByCode(string $code): array
    {
        $code = mb_strtoupper($code);

        return $this->findBy(['code' => $code]);
    }

    public function findById(string $id): ?Author
    {
        return $this->findOneBy(['id' => $id]);
    }
}