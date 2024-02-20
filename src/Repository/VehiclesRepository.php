<?php

namespace App\Repository;

use App\Entity\Vehicle;
use App\Entity\Vehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehicles>
 *
 * @method Vehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicles[]    findAll()
 * @method Vehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }


    public function findVehiclesFiltered($filters)
    {
        $query = $this->createQueryBuilder('v');
        if ($filters['minPrice'] !== "") {
            $query = $query
                ->andWhere('v.price >= :minPrice')
                ->setParameter('minPrice', $filters['minPrice']);
        }
        if ($filters['maxPrice'] !== "") {
            $query = $query
                ->andWhere('v.price <= :maxPrice')
                ->setParameter('maxPrice', $filters['maxPrice']);
        }
        if ($filters['minMileage'] !== "") {
            $query = $query
                ->andWhere('v.mileage >= :minMileage')
                ->setParameter('minMileage', $filters['minMileage']);
        }
        if ($filters['maxMileage'] !== "") {
            $query = $query
                ->andWhere('v.mileage <= :maxMileage')
                ->setParameter('maxMileage', $filters['maxMileage']);
        }

        $vehicles = $query
            ->setMaxResults(10)
            ->getQuery()
            ->getResult(AbstractQuery::HYDRATE_ARRAY);
        return $vehicles;
    }
    //    /**
    //     * @return Vehicles[] Returns an array of Vehicles objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Vehicles
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
