<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * Dire bonjour
     * @Route("/hello/{prenom}/age/{age}", name = "hello")
     * @Route("/hello/{prenom}")
     * @Route("/hello")
     *
     * @return string
     */
    public function hello ($prenom = "", $age = 0)
    {
        return new Response("hello $prenom vous avez $age ans !!!");
    }

    /**
     * function home
     * @Route("/", name="homepage")
     */
    public function home(){

        $prenoms = ["Enzo"=>15, "Bruno"=>46, "maman"=>68, "papa"=>69];

        return $this->render(
            "home/accueil.html.twig",
            [
                "title"=>"Hello and welcome on my Twig body template",
                "name"=>"Bruno",
                "age"=> 18,
                "tableau"=>$prenoms
            ]
        );
    }
}