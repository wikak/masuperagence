<?php
namespace App\Controller;


use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

/**
 *
 */
class HomeController extends AbstractController
{
    /**
     * @var Environment
     * @param PropertyRepository $repository
     * @return Response
     */

    public function index(PropertyRepository $repository) : Response
	{
	    $properties =  $repository->findLastest();
        //dump($properties);
     return $this->render('pages/home.html.twig',[
         'properties' => $properties
     ]);
	}
}
