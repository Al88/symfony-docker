<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return User[] Returns an array of User objects
    */
   public function findByExampleField($value): array
   {
       return $this->createQueryBuilder('u')
           ->andWhere('u.email = :val')
           ->setParameter('val', $value)
           ->orderBy('u.id', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;
   }

   public function all(): array
   {
    

           $entityManager = $this->getEntityManager();

           $query = $entityManager->createQuery(
               'SELECT u.name, u.email
               FROM App\Entity\User u'
           );
   
           // returns an array of Product objects
           return $query->getResult();
   }

   public function allUsers(): array
   {
       // automatically knows to select Products
       // the "p" is an alias you'll use in the rest of the query
       $qb = $this->createQueryBuilder('u');

       $query = $qb->getQuery();

       return $query->execute();

       // to get just one result:
       // $product = $query->setMaxResults(1)->getOneOrNullResult();
   }

   public function findOneBySomeField($value): ?User
   {
       return $this->createQueryBuilder('u')
           ->andWhere('u.email = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }
}
