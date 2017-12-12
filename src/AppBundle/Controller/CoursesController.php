<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Course;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursesController extends Controller
{

    /**
     * @Route("/courses", name="courses")
     */
    public function indexAction(){
        // doctrine
        $doctrine = $this->getDoctrine();

        // getRepository : SELECT
        $results = $doctrine->getRepository(Course::class)->findAll();
        //exit(dump($results));

        return $this->render('courses/index.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * @Route("/course/{slug}", name="course.detail")
     */
    public function detailAction($slug){
        // doctrine
        $doctrine = $this->getDoctrine();

        // getRepository : SELECT
        $results = $doctrine->getRepository(Course::class)->findOneBy([
            'slug' => $slug
        ]);
        //exit(dump($results));

        return $this->render('courses/detail.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * @Route("/course/query",name="course.query")
     */
    public function queryAction(){
        //doctrine
        $doctrine = $this->getDoctrine();

        //appel d'une méthode de la classe de dépot (repository)
        $result = $doctrine->getRepository(Course::class)->testQuery();
        exit(dump($result));

    }

}