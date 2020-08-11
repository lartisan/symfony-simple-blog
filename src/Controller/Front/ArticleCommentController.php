<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleCommentController extends AbstractController
{
    /**
     * @Route("/article/{id}/comment", name="front_article_comment")
     */
    public function new(Request $request, $id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $comment = new Comment();
        $comment->setBody($request->get('body'));
        $comment->setArticle($article);
        $comment->setUser($this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        return $this->json([
            'status' => 'ok',
            'comment' => $comment
        ]);
//        $comment = new Comment();
//        $form = $this->createForm(CommentType::class, $comment);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($comment);
//            $entityManager->flush();
//
//            return $this->json([
//                'comment' => $comment
//            ]);
//        }
    }
}
