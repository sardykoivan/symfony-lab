<?php

declare(strict_types=1);

namespace App\Repository\Library;

use App\Entity\Library\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findById(string $id): ?Book
    {
        return $this->findOneBy(['id' => $id]);
    }
}