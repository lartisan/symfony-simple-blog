<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleCommentController extends AbstractController
{
    /**
     * @Route("/article/{id}/comment", name="front_article_comment")
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function new(Request $request, $id): JsonResponse
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
    }
}
