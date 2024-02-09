<?php

namespace App\Application\Factory;

use App\Application\Notification\EmailNotification;
use App\Application\Notification\SmsNotification;
use App\Domain\Entity\NotificationChannels;
use Symfony\Component\Notifier\Notification\Notification;

final class NotificationFactory
{
    public static function createNotification(NotificationChannels $channel, string $message): Notification
    {
        return match ($channel) {
            NotificationChannels::PhoneNumber => new SmsNotification($message),
            NotificationChannels::Email => new EmailNotification($message),
        };
    }
}
