<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class);
    }

    private function haversine(): string // La formule de Haversine permet de déterminer la distance du grand cercle entre deux points d'une sphère, à partir de leurs longitudes et latitudes.//
    {
        return '(6371 * ACOS(
            COS(RADIANS(:lat)) * COS(RADIANS(s.latitude)) *
            COS(RADIANS(s.longitude) - RADIANS(:lon)) +
            SIN(RADIANS(:lat)) * SIN(RADIANS(s.latitude))
        ))';
    }

    public function findByProximite(float $lat, float $lon, float $rayonKm = 10): array
    {
        return $this->createQueryBuilder('s')
            ->addSelect($this->haversine() . ' AS HIDDEN distance')
            ->where('s.latitude IS NOT NULL')
            ->andWhere('s.longitude IS NOT NULL')
            ->having('distance <= :rayon')
            ->setParameter('lat', $lat)
            ->setParameter('lon', $lon)
            ->setParameter('rayon', $rayonKm)
            ->orderBy('distance', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByProximiteAvecDistance(float $lat, float $lon, float $rayonKm = 10): array
    {

        $results = $this->createQueryBuilder('s')
            ->addSelect($this->haversine() . ' AS distance')
            ->where('s.latitude IS NOT NULL')
            ->andWhere('s.longitude IS NOT NULL')
            ->having('distance <= :rayon')
            ->setParameter('lat', $lat)
            ->setParameter('lon', $lon)
            ->setParameter('rayon', $rayonKm)
            ->orderBy('distance', 'ASC')
            ->getQuery()
            ->getResult();

        return array_map(fn($row) => [
            'service'  => $row[0],
            'distance' => round((float) $row['distance'], 1),
        ], $results);
    }
}
