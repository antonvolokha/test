<?php

namespace App\Domain\Entity;

enum NotificationChannels: string
{
    case Email = 'email';
    case PhoneNumber = 'phone number';
}
