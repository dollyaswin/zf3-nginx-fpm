<?php
namespace Chat\Mapper;

use Doctrine\ORM\EntityManagerInterface;

class Chat
{
    /**
     * EntityManager
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    /**
     * Set EntityManager
     *
     * @param  EntityManagerInterface $entityManager
     *
     * @return $this
     */
    public function setEntityManager(EntityManagerInterface $em)
    {
        $this->em = $em;
        return $this;
    }

    /**
     * Get EntityManager
     *
     * @return EntityManagerInterface
     **/
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * Save Entity
     *
     * @param $entity
     */
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }
}
