<?php

namespace App\Repository;

use App\Entity\PatientAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PatientAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatientAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatientAddress[]    findAll()
 * @method PatientAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientAddressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PatientAddress::class);
    }

//    /**
//     * @return PatientAddress[] Returns an array of PatientAddress objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PatientAddress
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
