<?php

// интерфейс
interface MailerInterface
{
    public function send(string $message): void;
}

// реализация, к которой нужно динамически добавлять функционал, не изменяя класс
final class Mailer implements MailerInterface
{
    public function send(string $message): void
    {
        echo 'Mailer: ' . $message . PHP_EOL;
    }
}

$mailer = new Mailer();
$mailer->send('test');

// решение
abstract class AbstractDecorator implements MailerInterface
{
    public function __construct(protected MailerInterface $mailer)
    {
    }

    public function send(string $message): void
    {
        $this->mailer->send($message);
    }
}

class LoggableMailer extends AbstractDecorator
{
    public function send(string $message): void
    {
        echo 'LoggableMailer: ' . $message . PHP_EOL;
        parent::send($message);
    }
}

class SecurityCheckMailer extends AbstractDecorator
{
    public function send(string $message): void
    {
        echo 'SecurityCheckMailer: ' . $message . PHP_EOL;
        parent::send($message);
    }
}

echo '========' . PHP_EOL;
$loggableMailer = new LoggableMailer($mailer);
$loggableMailer->send('loggable message');
echo '========' . PHP_EOL;
$securityCheckMailer = new SecurityCheckMailer($mailer);
$securityCheckMailer->send('security check message');
echo '========' . PHP_EOL;
$twoFeaturesMailer = new SecurityCheckMailer(new LoggableMailer($mailer));
$twoFeaturesMailer->send('log and security check message');