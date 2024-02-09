<?php

declare(strict_types=1);

namespace App\Application\Handler\GetHealthStatus;

use App\Domain\Entity\HealthStatus;

final class GetHealthStatusResponse
{
    public function __construct(public readonly HealthStatus $status)
    {
    }
}
