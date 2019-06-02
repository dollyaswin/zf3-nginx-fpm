<?php
namespace Chat\V1\Rest\Chat;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Chat\V1\Service\Chat as ChatService;
use Zend\Paginator\Paginator as ZendPaginator;

class ChatResource extends AbstractResourceListener
{
    /**
     * @var \Chat\V1\Service\Chat
     */
    protected $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->setChatService($chatService);
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $chat = null;
        try {
            $chat = $this->getChatService()->insert($data);
        } catch (\RuntimeException $e) {
            return new ApiProblem(500, $e->getMessage());
        }

        if ($chat instanceof \Chat\Entity\Chat) {
            return $chat;
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $chat = $this->getChatService()->fetchEntity($id);
        if (is_null($chat)) {
            $chat = new ApiProblem(404, "Chat not found");
        }

        return $chat;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $chats = null;
        try {
            $chats = $this->getChatService()->retrieve($params->toArray());
        } catch (\Exception $e) {
            return new ApiProblem(500, $e->getMessage());
        }

        return new ZendPaginator($chats);
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }

    /**
     * @param \Chat\V1\Service\Chat $chatService
     */
    public function setChatService(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    /**
     * @return \Chat\V1\Service\Chat
     */
    public function getChatService()
    {
        return $this->chatService;
    }
}
