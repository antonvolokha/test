<?php

declare(strict_types=1);

namespace App\Application\Handler\SendNotification;

use Symfony\Component\Validator\Constraints as Assert;

final class SendNotificationCommand
{
    public function __construct(
        #[Assert\NotBlank]
        public readonly string|int $to = '',

        #[Assert\NotBlank]
        public readonly string $message = '',
    ) {
    }
}
