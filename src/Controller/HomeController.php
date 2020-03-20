<?php
  namespace App\Controller;

  use App\Entity\Content;
  use App\Entity\User;
  use App\Repository\ContentRepository;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\Routing\Annotation\Route;

  class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function indexAction(ContentRepository $contentRepository)
    {
        $published = $this->getDoctrine()
                            ->getRepository(Content::class)
                                ->findBy(array('state'=>("PUBLISHED")));
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('home.html.twig',[
            'current_menu' => 'home',
            'published' => $published
        ]);
    }

  }
