<?php

declare(strict_types=1);

namespace App\Entity\Library;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'library_authors')]
class Author
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    private string $id;

    #[ORM\Column(type: 'string', unique: true, length: 8)]
    private string $code;

    #[ORM\Column(type: 'string', length: 32)]
    private string $fullName;

    #[ORM\Column(type: 'integer')]
    private int $yearOfBirth;

    public function __construct(string $id, string $code, string $fullName, int $yearOfBirth)
    {
        $this->id = $id;
        $this->code = $code;
        $this->fullName = $fullName;
        $this->yearOfBirth = $yearOfBirth;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getYearOfBirth(): int
    {
        return $this->yearOfBirth;
    }
}