<?php

declare(strict_types=1);

namespace App\Service\Library;

use App\Repository\Library\BookRepository;
use Doctrine\ORM\EntityManagerInterface;

final class BookService
{
    public function __construct(
        private EntityManagerInterface $em,
        private BookRepository $bookRepository,
    ) {
    }
}