<?php

namespace App\Presentation\Controller\Notification;

use App\Application\Attribute\MapMessage;
use App\Application\Handler\ApplyAccountAction\ApplyAccountActionCommand;
use App\Application\Handler\SendNotification\SendNotificationCommand;
use App\Presentation\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use OpenApi\Attributes as OA;

#[AsController]
class SendNotificationController extends AbstractController
{
    #[OA\Post(
        summary: 'Send message',
        tags: ['Notification'],
        parameters: [
            new OA\Parameter(name: 'to', description: 'To message', in: 'query'),
            new OA\Parameter(name: 'message', description: 'Message', in: 'query',),
        ],
        responses: [
            new OA\Response(
                response: Response::HTTP_OK,
                description: 'OK',
            ),
        ],
    )]
    #[Route(
        path: '/notification',
        name: 'send_notification',
        methods: Request::METHOD_GET,
        format: JsonEncoder::FORMAT,
    )]
    public function __invoke(#[MapMessage] SendNotificationCommand $message): Envelope
    {
        return $this->commandBus->dispatch($message);
    }
}
