<?php

namespace App\Services\Startup\Interfaces\Http\Controllers;

use App\Http\Controllers\AbstractController;
use App\Services\Startup\Infrastructure\Contracts\GetStartupMessageInterface;
use App\Services\Startup\Interfaces\Http\Resources\MessageStartupResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Micromus\ServiceSwagger\Attributes\Responses\ResourceResponse;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Tag;

#[Tag(
    name: 'Startup',
    description: 'Методы сервиса Startup'
)]
final class IndexStartupController extends AbstractController
{
    #[Get(
        path: '/',
        summary: 'Получение приветственного сообщения',
        tags: ['Startup'],

        responses: [
            new ResourceResponse(MessageStartupResource::class),
        ]
    )]
    public function index(GetStartupMessageInterface $subservice): JsonResource
    {
        return new MessageStartupResource($subservice->getStartupMessage());
    }
}
