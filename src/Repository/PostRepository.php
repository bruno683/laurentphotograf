<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findPostPublished()
    {
        $q = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->andWhere('p.isPublished = true');
        return $q->getQuery()->getResult();
        /*return $this->createQueryBuilder('p')
            ->andWhere('p.isPublished = true')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();*/
    }
}
