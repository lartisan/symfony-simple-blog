<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ArticleVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, ['ARTICLE_EDIT', 'ARTICLE_DELETE'])
            && $subject instanceof \App\Entity\Article;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        switch ($attribute) {
            case 'ARTICLE_EDIT':
                return $user === $subject->getAuthor();
                break;
            case 'ARTICLE_DELETE':
                return $user === $subject->getAuthor();
        }

        return false;
    }
}
