<?php

declare(strict_types=1);

namespace App\Application\Notification;

use Override;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Notification\SmsNotificationInterface;
use Symfony\Component\Notifier\Recipient\SmsRecipientInterface;

final class SmsNotification extends Notification implements SmsNotificationInterface
{
    public function __construct(
        private readonly string $message,
    ) {
        parent::__construct();
    }

    #[Override]
    public function asSmsMessage(SmsRecipientInterface $recipient, ?string $transport = null): ?SmsMessage
    {
        return new SmsMessage($recipient->getPhone(), $this->message);
    }
}
