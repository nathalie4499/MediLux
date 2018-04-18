<?php

namespace App\Repository;

use App\Entity\AddressDoctors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AddressDoctors|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddressDoctors|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddressDoctors[]    findAll()
 * @method AddressDoctors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressDoctorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AddressDoctors::class);
    }

//    /**
//     * @return AddressDoctors[] Returns an array of AddressDoctors objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AddressDoctors
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
