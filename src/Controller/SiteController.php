<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\DoctrineBundle\Registry;

class SiteController extends AbstractController
{
    /**
     * @Route("/site", name="site")
     */
    public function index()
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/users", name="users")
     */
    public function users()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $userList = implode('</li><li>', array_column($users, 'username'));


        return $this->render('site/users.html.twig', [
            'user_list' => $userList,
        ]);
    }
}
