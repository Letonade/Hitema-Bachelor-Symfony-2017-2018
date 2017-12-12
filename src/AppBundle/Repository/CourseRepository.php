<?php

namespace AppBundle\Repository;


class CourseRepository extends \Doctrine\ORM\EntityRepository
{
    public function testQuery()
    {
        /*
         *create query builder : constructeur de requête
         *      Définir l'Alias de l'entité
         * méthode aux noms des formule SQL :
         *      Select
         *      => choix des propriété à affiché (en tableau)
         *      WHERE,ANDWHERE,ORWHERE
         *      => Where en premier connexion, puis les autres
         * getQuery : éxécution de la requête / appel en avant dernière position
         *Récupération des résultats :
         *      getResult : renvoie un array d'objets
         *
         **/

        $query = $this->createQueryBuilder('courseAlias')
            ->select('courseAlias.id','courseAlias.name','courseAlias.slug')
            ->where('courseAlias.name = :nameParam')
            ->orWhere('courseAlias.name LIKE :likeParam')
            ->setParameters([
                'nameParam' => "M1-Web",
                'likeParam' => "%J%"
            ])
            ->getQuery()
            ->getResult()
        ;

        return $query;
        //retour des résultats
    }
}
