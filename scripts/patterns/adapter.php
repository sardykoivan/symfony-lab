<?php

// интерфейс
interface MailerInterface
{
    public function send(string $message): void;
}

// реализация
final class Mailer implements MailerInterface
{
    public function send(string $message): void
    {
        echo 'Mailer: ' . $message . PHP_EOL;
    }
}

// нужно иметь возможность заменять Mailer на ExtMailer или InternalMailer
final class ExtMailer
{
    public function sendMessage(string $message): void
    {
        echo 'ExtMailer: ' . $message . PHP_EOL;
    }
}

final class InternalMailer
{
    public function sendInternalMessage(string $message): void
    {
        echo 'InternalMailer: ' . $message . PHP_EOL;
    }
}

$mailer = new Mailer();
$mailer->send('test');

// решение
echo '=============' . PHP_EOL;

final class ExtMailerAdapter implements MailerInterface
{
    public function __construct(private ExtMailer $extMailer)
    {
    }

    public function send(string $message): void
    {
        $this->extMailer->sendMessage($message);
    }
}

final class InternalMailerAdapter implements MailerInterface
{
    public function __construct(private InternalMailer $internalMailer)
    {
    }

    public function send(string $message): void
    {
        $this->internalMailer->sendInternalMessage($message);
    }
}

$extMailerAdapter = new ExtMailerAdapter(new ExtMailer());
$extMailerAdapter->send('ext message');
$internalMailerAdapter = new InternalMailerAdapter(new InternalMailer());
$internalMailerAdapter->send('internal message');
