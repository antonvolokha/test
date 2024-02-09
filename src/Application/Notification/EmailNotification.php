<?php

declare(strict_types=1);

namespace App\Application\Notification;

use Override;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Notifier\Message\EmailMessage;
use Symfony\Component\Notifier\Notification\EmailNotificationInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\EmailRecipientInterface;

final class EmailNotification extends Notification implements EmailNotificationInterface
{
    public function __construct(
        private readonly string $message,
    ) {
        parent::__construct();
    }

    #[Override]
    public function asEmailMessage(EmailRecipientInterface $recipient, string $transport = null): ?EmailMessage
    {
        $email = new TemplatedEmail();
        $email->to($recipient->getEmail());
        $email->subject('Email Notification');
        $email->htmlTemplate(template: '@emails/email.notification.html.twig');
        $email->context([
            'message' => $this->message,
        ]);

        return new EmailMessage($email);
    }
}
