<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    // /**
    //  * @return Utilisateur[] Returns an array of Utilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findOneByEmail($mail): ?Utilisateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.mail = :val')
            ->setParameter('val', $mail)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    
    public function findByMailMotDePasse($mail, $mdp)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.mail = :mail and m.motdepasse = :mdp')
             
            ->setParameter('mail', $mail)
            ->setParameter('mdp', $mdp)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
