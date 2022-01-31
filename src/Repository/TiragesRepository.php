<?php

namespace App\Repository;

use App\Entity\Tirages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tirages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tirages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tirages[]    findAll()
 * @method Tirages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TiragesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tirages::class);
    }

    public function findEnVente()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.enVente = true')
            ->getQuery()
            ->getResult();
    }
}
