<?php
declare(strict_types=1);

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
        // $chat = $this->getChatHydrator()->hydrate($data, new \Chat\Entity\Chat);
        $chat = new \Chat\Entity\Chat;
        try {
            $chat->setMessage($data->message);
            $this->getChatMapper()->save($chat);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }

        return $chat;
    }

    /**
     * Retrieve chats
     *
     * @param   array $params
     * @return  DoctrineORMModule\Paginator\Adapter\DoctrinePaginator
     *
     * @throw   \Exception
     */
    public function retrieve(array $params)
    {
        try {
            $chats  = $this->getChatMapper()->fetchAll($params);
            return $this->getChatMapper()->createPaginatorAdapter($chats);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * Fetch a chat
     *
     * @param   string $uuid
     * @return  null|\Chat\Entity\Chat $chat
     *
     * @throw   \Exception
     */
    public function fetchEntity($uuid)
    {
        $chat = null;
        try {
            $chat  = $this->getChatMapper()->fetchOne($uuid);
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
