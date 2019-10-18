<?php

namespace App\Controller;

use App\Form\PostType;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * SiteController constructor.
     * @param UserRepository $userRepository
     * @param PostRepository $postRepository
     */
    public function __construct(UserRepository $userRepository, PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
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
        $post = $this->postRepository->findOneBy(['id' => $id]);

        return $this->render('site/post.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/post-edit/{id}", name="post-edit")
     * @throws \Exception
     */
    public function postEdit(Request $request, $id)
    {
        $post = $this->postRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post');
        }

        return $this->render('site/post-edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/list", name="list")
     * @throws \Exception
     */
    public function list()
    {
        $categories = $this->categoryRepository->findAll();

        return $this->render('site/list.html.twig', [
            'categories' => $categories,
        ]);
    }
}
