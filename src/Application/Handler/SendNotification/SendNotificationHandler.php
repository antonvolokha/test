<?php

namespace App\Application\Handler\SendNotification;

use App\Application\Factory\NotificationFactory;
use App\Application\Factory\RecipientFactory;
use App\Domain\Entity\NotificationChannels;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Notifier\NotifierInterface;

#[AsMessageHandler(bus: 'command.bus')]
final class SendNotificationHandler
{
    public function __construct(
        private NotifierInterface $notifier,
    ) {
    }

    public function __invoke(SendNotificationCommand $message): SendNotificationResponse
    {
        $channel = match (true) {
            !filter_var($message->to, FILTER_VALIDATE_EMAIL) => NotificationChannels::PhoneNumber,
            default => NotificationChannels::Email,
        };

        $recipient = RecipientFactory::createRecipient($channel, $message->to);
        $notification = NotificationFactory::createNotification($channel, $message->message);

        $this->notifier->send($notification, $recipient);

        return new SendNotificationResponse($channel);
    }
}
