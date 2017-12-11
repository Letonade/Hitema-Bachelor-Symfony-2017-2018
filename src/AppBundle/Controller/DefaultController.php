<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route(
     *     "/hello/{name}",
     *     name="hello",
     *     requirements={"name" = "[a-zA-Z]+"},
     *     defaults={"name" = "Anonyme"}
     * )
     * @Method({"GET", "POST"})
     */
    public function helloAction(Request $request, $name)
    {
        return $this->render('default/hello.html.twig', [
            'key' => 'value',
            'list' => [ 'clé1' => 'value1', 'clé2' => 'value2' ],
            'name' => $name
        ]);
    }

}
