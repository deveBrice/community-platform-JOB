<?php

namespace App\Controller;

use App\Entity\Content;

use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/publisher")
 */
class PublisherController extends AbstractController
{
    /**
     * @Route("/", name="publisher_index", methods={"GET"})
     */
    public function index(ContentRepository $contentRepository): Response
    {
        return $this->render('publisher/index.html.twig', [
            'publishers' => $contentRepository->findBy(array('state'=> 'APPROVED')),
        ]);
    }
}
