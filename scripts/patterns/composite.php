<?php

interface FileSystemEntity
{
    public function contains(string $prefix = '', bool $isRoot = false): void;
    public function getPath(): string;
}

// Класс файла
final class File implements FileSystemEntity
{
    public function __construct(private string $path) {}

    public function contains(string $prefix = '', bool $isRoot = false): void
    {
        echo $prefix . $this->getPath() . PHP_EOL;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}

// Класс папки (Композит)
final class Folder implements FileSystemEntity
{
    /** @var array<FileSystemEntity> */
    private array $nodes = [];

    public function __construct(private string $path) {}

    public function contains(string $prefix = '', bool $isRoot = false): void
    {
        // Добавляем первый `/` только для корневой папки
        $path = $isRoot ? '/' . $this->getPath() : $prefix . $this->getPath();
        echo $path . '/' . PHP_EOL;

        foreach ($this->nodes as $node) {
            $node->contains($path . '/', false);
        }
    }

    public function add(FileSystemEntity $entity): void
    {
        $this->nodes[] = $entity;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}

// Создание файлов и директорий
$fileDocTxt = new File('doc.txt');
$fileIndexPhp = new File('index.php');
$fileHtaccess = new File('.htaccess');
$dirVar = new Folder('var');
$dirWww = new Folder('www');
$dirPublic = new Folder('public');
$dirDoc = new Folder('doc');

$dirPublic->add($fileHtaccess);
$dirPublic->add($fileIndexPhp);
$dirDoc->add($fileDocTxt);
$dirWww->add($dirPublic);
$dirWww->add($dirDoc);
$dirVar->add($dirWww);

// Вывод структуры (Корень с `/`)
$dirVar->contains('', true);
