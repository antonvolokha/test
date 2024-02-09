<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;

#[WithHttpStatus(statusCode: Response::HTTP_UNPROCESSABLE_ENTITY)]
class InvalidNotificationChannelException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct(message: 'Invalid notification channel.');
    }
}
