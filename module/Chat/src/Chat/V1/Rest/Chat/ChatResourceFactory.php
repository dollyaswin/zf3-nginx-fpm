<?php
namespace Chat\V1\Rest\Chat;

class ChatResourceFactory
{
    public function __invoke($services)
    {
        $chatService = $services->get(\Chat\V1\Service\Chat::class);
        return new ChatResource($chatService);
    }
}
