<?php

declare(strict_types=1);

namespace App\Application\Handler\GetHealthStatus;

use App\Domain\Entity\HealthStatus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(bus: 'query.bus')]
final class GetHealthStatusHandler
{
    public function __invoke(GetHealthStatusQuery $message): GetHealthStatusResponse
    {
        return new GetHealthStatusResponse(HealthStatus::Ok);
    }
}
