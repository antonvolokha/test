<?php

declare(strict_types=1);

namespace App\Application\Handler\SendNotification;

use App\Domain\Entity\NotificationChannels;

class SendNotificationResponse
{
    public function __construct(public readonly NotificationChannels $channel)
    {
    }
}
