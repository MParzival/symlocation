<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    // /**
    //  * @return Vehicle[] Returns an array of Vehicle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findByBrandAndModelAndImmat(string $value)
    {
        return $this->createQueryBuilder('v')
            ->orWhere('v.brand LIKE :val')
            ->orWhere('v.model LIKE :val')
            ->orWhere('v.immatriculation LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('v.model','ASC' )
            ->getQuery()
            ->getResult()
            ;
    }

    public function getNb()
    {
        return $this->createQueryBuilder('d')

            ->select('COUNT(d)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /*public function getVoitureOff()
    {
        return $this->createQueryBuilder('d')

            ->select('COUNT(d)')
            ->leftJoin('d.rentals', "r")
            ->addSelect("r")
            ->where('r.conducteur')
            ->getQuery()
            ->getSingleScalarResult();
    }*/
}
