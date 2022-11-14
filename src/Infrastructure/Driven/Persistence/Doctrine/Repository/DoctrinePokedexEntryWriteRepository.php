<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Repository;

use App\Application\Repository\Pokedex\PokedexEntryWriteRepository;
use App\Domain\Pokedex\PokedexEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<PokedexEntry> */
final class DoctrinePokedexEntryWriteRepository extends ServiceEntityRepository implements PokedexEntryWriteRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokedexEntry::class);
    }

    public function save(PokedexEntry $pokedexEntry): void
    {
        $this->_em->persist($pokedexEntry);
        $this->_em->flush();
    }
}
