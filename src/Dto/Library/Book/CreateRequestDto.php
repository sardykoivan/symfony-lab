<?php

declare(strict_types=1);

namespace App\Dto\Library\Book;

final class CreateRequestDto
{
    public function __construct(
       public string $authorId,
       public string $title,
       public array $tags,
    ) {
    }
}