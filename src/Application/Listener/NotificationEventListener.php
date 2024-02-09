<?php

declare(strict_types=1);

namespace App\Application\Listener;

use App\Application\Notification\EmailNotification;
use App\Application\Notification\AccountRegisteredNotification;
use App\Domain\Event\AccountActivatedEvent;
use App\Domain\Event\AccountRegisteredEvent;
use App\Domain\Event\SendNotificationEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Contracts\Translation\TranslatorInterface;

final class NotificationEventListener
{
    public function __construct(
        private NotifierInterface $notifier,
        private TranslatorInterface $translator,
    ) {
    }

    #[AsEventListener(event: SendNotificationEvent::class)]
    public function onAccountActivated(SendNotificationEvent $event): void
    {
        $recipient = new Recipient($event->account->getEmail());
        $notification = new EmailNotification($event->account, $this->translator);
        $this->notifier->send($notification, $recipient);
    }
}
