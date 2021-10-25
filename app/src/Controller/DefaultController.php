<?php

namespace App\Controller;

use App\Entity\Site;
use App\Repository\SiteItemRepository;
use App\Repository\SiteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request, SiteRepository $siteRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $siteRepository->getItemsQueryBuilder()->getQuery(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('default/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/site/{id}", name="site_item")
     */
    public function siteItem(
        Site $site,
        Request $request,
        SiteItemRepository $siteItemRepository,
        PaginatorInterface $paginator
    ): Response {

        $pagination = $paginator->paginate(
            $siteItemRepository->getItemsQueryBuilderBySiteEntity($site)->getQuery(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('default/site.html.twig', [
            'pagination' => $pagination,
            'site' => $site
        ]);
    }
}

