<?php
namespace Chat\V1\Service;

use \Chat\Mapper\Chat as ChatMapper;

class Chat
{
    /**
     * @var \Chat\Mapper\Chat
     */
    protected $chatMapper;

    /**
     * @param \Chat\Mapper\Chat $chatMapper
     */
    public function __construct(ChatMapper $chatMapper)
    {
        $this->setChatMapper($chatMapper);
    }

    /**
     * Create a resource
     *
     * @param   mixed $data
     * @return  Chat\Entity\Chat
     * @throw   \RuntimeException
     */
    public function insert($data)
    {
        $chat = new \Chat\Entity\Chat;
        $chat->setMessage($data->message);
        $chat->setCreatedAt(new \DateTime);

        try {
            $this->getChatMapper()->save($chat);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }

        return $chat;
    }

    /**
     * @param \Chat\Mapper\Chat $chatMapper
     */
    public function setChatMapper(ChatMapper $chatMapper)
    {
        $this->chatMapper = $chatMapper;
    }

    /**
     * return \Chat\Mapper\Chat
     */
    public function getChatMapper()
    {
        return $this->chatMapper;
    }
}
