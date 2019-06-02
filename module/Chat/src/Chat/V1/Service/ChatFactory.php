<?php
namespace Chat\V1\Service;

class ChatFactory
{
    public function __invoke($services)
    {
        $chatMapper = $services->get(\Chat\Mapper\Chat::class);
        $chatHydrator = $services->get('HydratorManager')->get('Chat\Hydrator\Chat');
        return new Chat($chatMapper, $chatHydrator);
    }
}
