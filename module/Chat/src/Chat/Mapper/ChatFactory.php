<?php
namespace Chat\Mapper;

class ChatFactory
{
    public function __invoke($container)
    {
        $chat = new Chat($container->get('doctrine.entitymanager.orm_default'));
        return $chat;
    }
}
