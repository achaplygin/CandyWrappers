<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ContentRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ContentRepository
     */
    private $contentRepository;

    /**
     * SiteController constructor.
     * @param UserRepository $userRepository
     * @param ContentRepository $contentRepository
     */
    public function __construct(UserRepository $userRepository, ContentRepository $contentRepository)
    {
        $this->userRepository = $userRepository;
        $this->contentRepository = $contentRepository;
    }
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
     */
    public function users()
    {
        $users = $this->userRepository->findAll();

        $this->addFlash('notice', 'app.flashes');

        return $this->render('site/users.html.twig', [
            'user_list' => $users,
        ]);
    }

    /**
     * @Route("/post/{id}", name="post")
     * @throws \Exception
     */
    public function post($id)
    {
        $post = $this->contentRepository->findOneBy(['id' => $id]);

        return $this->render('site/post.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/list", name="list")
     * @throws \Exception
     */
    public function list()
    {
        $posts = $this->contentRepository->findAll();

        return $this->render('site/list.html.twig', [
            'posts' => $posts,
        ]);
    }
}
