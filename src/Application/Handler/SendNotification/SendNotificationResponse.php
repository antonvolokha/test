<?php

namespace App\Application\Handler\SendNotification;

use App\Domain\Entity\NotificationChannels;

class SendNotificationResponse
{
    public function __construct(public readonly NotificationChannels $channel)
    {
    }
}
