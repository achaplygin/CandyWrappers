<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="site")
     */
    public function index()
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/users", name="users")
     * @IsGranted("ROLE_USER")
     */
    public function users()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $this->addFlash('notice', 'app.flashes');

        return $this->render('site/users.html.twig', [
            'user_list' => $users,
        ]);
    }
}
