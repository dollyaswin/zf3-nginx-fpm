<?php
namespace Chat\Mapper;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;

class Chat
{
    /**
     * EntityManager
     */
    protected $em;

    /**
     * @param EntityManagerInterface $em
     */
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
     * Get Entity Repository
     */
    public function getEntityRepository()
    {
        return $this->getEntityManager()->getRepository('Chat\\Entity\\Chat');
    }

    /**
     * Save Entity
     *
     * @param  \Chat\Entity\Chat $entity
     * @return \Chat\Entity\Chat
     * @throw  \Exception
     */
    public function save(\Chat\Entity\Chat $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    /**
     * Fetch Chat by uuid
     *
     * @param string $uuid
     */
    public function fetchOne($uuid)
    {
        return $this->getEntityRepository()->findOneBy(['uuid' => $uuid]);
    }

    /**
     * @param  array  $params
     * @param  string $order
     * @param  bool   $asc
     * @return Doctrine\ORM\Query
     */
    public function fetchAll(array $params, $order = null, $asc = false)
    {
        $qb = $this->getEntityRepository()->createQueryBuilder('c');
        $sort = ($asc == 0) ? 'DESC' : 'ASC';
        if (is_null($order)) {
            $qb->orderBy('c.createdAt', $sort);
        } else {
            $qb->orderBy('c.' . $order, $sort);
        }

        $query = $qb->getQuery();
        return $query;
    }

   /**
     * Get Paginator Adapter
     *
     * @param  Doctrine\ORM\QueryBuilder $queryBuilder
     * @return DoctrineORMModule\Paginator\Adapter\DoctrinePaginator
     */
    public function createPaginatorAdapter($queryBuilder)
    {
        $doctrinePaginator = new DoctrinePaginator($queryBuilder, true);
        $adapter = new DoctrinePaginatorAdapter($doctrinePaginator);

        return $adapter;
    }
}
