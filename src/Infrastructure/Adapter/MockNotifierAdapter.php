<?php

namespace App\Infrastructure\Adapter;

use Psr\Log\LoggerInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\RecipientInterface;

readonly class MockNotifierAdapter implements NotifierInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    #[\Override]
    public function send(Notification $notification, RecipientInterface ...$recipients): void
    {
        $this->logger->info('Message sent');
    }
}
