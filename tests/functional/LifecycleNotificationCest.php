<?php

declare(strict_types=1);

namespace App\Tests;

use App\Domain\Entity\HealthStatus;
use App\Domain\Entity\NotificationChannels;
use Codeception\Util\HttpCode;

final class LifecycleNotificationCest
{
    public function checkHealthStatus(FunctionalTester $i): void
    {
        $i->haveHttpHeaderApplicationJson();
        $i->sendGet(url: '/api/notification?to=antonvolokha@gmail.com&message=test');
        $i->seeResponseCodeIs(code: HttpCode::OK);
        $i->seeResponseIsJson();
        $i->seeResponseContainsJson(['status' => NotificationChannels::Email->value]);

        $i->sendGet(url: '/api/notification?to=380501049343@gmail.com&message=test');
        $i->seeResponseCodeIs(code: HttpCode::OK);
        $i->seeResponseIsJson();
        $i->seeResponseContainsJson(['status' => NotificationChannels::PhoneNumber->value]);
    }
}
