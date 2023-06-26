<?php

namespace App\Services\Startup\Interfaces\Http\Resources;

use App\Services\Startup\Infrastructure\DataTransferObjects\MessageData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    title: 'Message Startup Resource',
    description: 'Структура приветственного сообщения'
)]
final class MessageStartupResource extends JsonResource
{
    /**
     * @var MessageData
     */
    public $resource;

    #[Property(description: 'Сообщение')]
    public string $message = 'Hello world';

    /**
     * @return void
     */
    public function __construct(MessageData $resource)
    {
        parent::__construct($resource);
    }

    /**
     * @param  Request  $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'message' => $this->resource->message,
        ];
    }
}
