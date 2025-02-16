<?php

declare(strict_types=1);

namespace App\Dto\Library\Author;

final class CreateRequestDto
{
    public function __construct(
        public string $fullName,
        public string $code,
        public int $yearOfBirth,
    ) {
    }
}