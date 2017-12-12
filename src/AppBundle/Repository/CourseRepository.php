<?php

namespace AppBundle\Repository;


class CourseRepository extends \Doctrine\ORM\EntityRepository
{
    public function testQuery()
    {
        /*
         *create query builder : constructeur de requête
         *      Définir l'Alias de l'entité
         * getQuery : éxécution de la requête / appel en avant dernière position
         *Récupération des résultats :
         *      getResult : renvoie un array d'objets
         *
         **/
        $query = $this->createQueryBuilder('courseAlias')
            ->getQuery()
            ->getResult()
        ;

        //retour des résultate
    }
}
