<?php

namespace App\Domain\PrayerTime\Repository;

use App\Domain\PrayerTime\Entity\PrayerTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PrayerTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrayerTime::class);
    }


    public function save(PrayerTime $prayerTime, bool $flush = true): void
    {
        $em = $this->getEntityManager();
        $em->persist($prayerTime);

        if ($flush) {
            $em->flush();
        }
    }

    //    /**
    //     * @return PrayerTime[] Returns an array of PrayerTime objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PrayerTime
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
