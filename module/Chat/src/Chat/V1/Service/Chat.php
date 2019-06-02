<?php
namespace Chat\V1\Service;

use \Chat\Mapper\Chat as ChatMapper;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class Chat
{
    /**
     * @var \Chat\Mapper\Chat
     */
    protected $chatMapper;

    /**
     * @var \Chat\Hydrator\Chat
     */
    protected $chatHydrator;

    /**
     * @param DoctrineObject $hydrator
     */
    public function __construct(ChatMapper $chatMapper, DoctrineObject $chatHydrator)
    {
        $this->setChatMapper($chatMapper);
        $this->setChatHydrator($chatHydrator);
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
        $data = json_decode(json_encode($data), true);
        $chat = $this->getChatHydrator()->hydrate($data, new \Chat\Entity\Chat);
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

    /**
     * @param DoctrineObject $chatHydrator
     */
    public function setChatHydrator(DoctrineObject $chatHydrator)
    {
        $this->chatHydrator = $chatHydrator;
    }

    /**
     * return DoctrineObject
     */
    public function getChatHydrator()
    {
        return $this->chatHydrator;
    }
}
