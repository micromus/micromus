<?php

namespace App\Services\Startup\Interfaces\Http\Resources;

use Illuminate\Http\Request;
use Micromus\Startup\DataTransferObjects\StartupData;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Property;
use Illuminate\Http\Resources\Json\JsonResource;

#[Schema(
    title: 'Message Startup Resource',
    description: 'Структура приветственного сообщения'
)]
final class MessageStartupResource extends JsonResource
{
    /**
     * @var StartupData
     */
    public $resource;

    #[Property(description: 'Сообщение')]
    public string $message = 'Hello world';

    /**
     * @param StartupData $resource
     * @return void
     */
    public function __construct(StartupData $resource)
    {
        parent::__construct($resource);
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'message' => $this->resource->message
        ];
    }
}
