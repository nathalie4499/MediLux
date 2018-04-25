<?php

namespace App\Repository;

use App\Entity\Doctors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method Doctors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Doctors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Doctors[]    findAll()
 * @method Doctors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Doctors::class);
    }
    
    public function dataExists(string $dataFromForm)
    {
        return $this->createQueryBuilder('d')
        ->andWhere('d.specialization LIKE :val')
        ->setParameter('val', '%' . $dataFromForm . '%')
        ->orderBy('d.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getArrayResult();
        
    }

//    /**
//     * @return Doctors[] Returns an array of Doctors objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Doctors
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
