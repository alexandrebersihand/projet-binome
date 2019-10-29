<?php

namespace App\Repository;

use App\Entity\Definition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Definition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Definition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Definition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefinitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Definition::class);
    }


    /**
     * @param int $limit
     * @return definition []
     */
    public function findLatestPublished(int $limit=10)
    {
        return $this->getEntityManager()->createQuery(
            'SELECT a FROM '.Definition::class.' a'

        )
            ->setMaxResults($limit)
            ->getResult();
    }

}

