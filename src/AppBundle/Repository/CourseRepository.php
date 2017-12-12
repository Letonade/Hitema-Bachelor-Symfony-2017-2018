<?php

namespace AppBundle\Repository;


class CourseRepository extends \Doctrine\ORM\EntityRepository
{
    public function testQuery()
    {
        /*
         *
         *
         **/
        $result = $this->createQueryBuilder();

    }
}
