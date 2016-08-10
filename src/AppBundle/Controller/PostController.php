<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController
{
    private $entityManager;
    private $templating;

    public function __construct(
        EntityManagerInterface $entityManager,
        EngineInterface $templating
    )
    {
        $this->entityManager = $entityManager;
        $this->templating = $templating;

    }

    public function indexAction(Request $request)
    {
        $repository = $this->entityManager->getRepository(Post::class);
        $posts = $repository->findAll();

        return new Response($this->templating->render(
            '@App/Post/index.html.twig',
            [
                'posts' => $posts
            ]
        ));
    }
}
