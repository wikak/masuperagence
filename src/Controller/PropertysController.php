<?php
namespace App\Controller;

use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




/**
 *
 */
class PropertysController extends AbstractController
{
    private $repository;
    private $em;

    public function __construct (PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request) : Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class,$search);
        $form->handleRequest($request);

        $properties = $paginator->paginate(
            $this->repository->findAllVisibileQuery($search),
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        ) ;
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
            'properties' =>$properties,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show($slug, $id) : Response
    {

        return $this->render('property/show.html.twig',[
            'property' => $this->repository->find($id),
            'current_menu' => 'properties'
        ]);
    }
}
