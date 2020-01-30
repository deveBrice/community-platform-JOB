<?php
  namespace App\Controller;
 
  use App\Entity\User;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\Routing\Annotation\Route;

  class HomeController extends AbstractController {
    
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('home.html.twig');
    }
  }
?>