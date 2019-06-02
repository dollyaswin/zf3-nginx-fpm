<?php
namespace Chat\V1\Rest\Chat;

class ChatResourceFactory
{
    public function __invoke($services)
    {
        //$chatService = \Chat\V1\Service\ChatFactory($services->get(\Chat\Mapper\Chat::class));
    //echo get_class($chatService);
    //exit;
    //$chatService = new \Chat\V1\Service\Chat($services->get(\Chat\Mapper\Chat::class));
        $chatService = $services->get(\Chat\V1\Service\Chat::class);
        return new ChatResource($chatService);
    }
}
