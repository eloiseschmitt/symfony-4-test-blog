<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue !"
        ]);
    }

    /**
     * @Route("/blog/new", name="blog_create")
     */
    public function create() {
        $article = new Article();

        $form = $this->createFormBuilder($article)
                    ->add('title', TextType::class, [
                        'attr' => [
                            'placeholder' => "Titre de l'article",
                            'class' => 'form-control'
                        ]
                    ])
                    ->add('content', TextareaType::class, [
                        'attr' => [
                            'placeholder' => "Contenu de l'article",
                            'class' => 'form-control'
                        ]
                    ])
                    ->add('image', TextType::class, [
                        'attr' => [
                            'placeholder' => "Image de l'article",
                            'class' => 'form-control'
                        ]
                    ])
                    ->getForm();

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article) {
        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }
    
}
