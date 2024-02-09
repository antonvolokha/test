<?php

namespace App\Application\Factory;

use App\Domain\Entity\NotificationChannels;
use Symfony\Component\Notifier\Recipient\Recipient;

final class RecipientFactory
{
    public static function createRecipient(NotificationChannels $channel, string $to): Recipient
    {
        return match ($channel) {
            NotificationChannels::PhoneNumber => new Recipient(phone: $to),
            NotificationChannels::Email => new Recipient(email: $to),
        };
    }
}
