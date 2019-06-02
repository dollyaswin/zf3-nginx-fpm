<?php
namespace Chat\V1\Service;

class ChatFactory
{
    public function __invoke($services)
    {
        $chatMapper = $services->get(\Chat\Mapper\Chat::class);
        return new Chat($chatMapper);
    }
}
