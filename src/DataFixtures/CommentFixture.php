<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Comment::class, 50, function(Comment $comment) {
            $comment
                ->setBody($this->faker->sentence(2))
                ->setArticle(
                    $this->getReference(sprintf('App\Entity\Article_%d', $this->faker->numberBetween(0,4)))
                )
                ->setUser(
                    $this->getReference(sprintf('User_%d', $this->faker->numberBetween(0, 2)))
                )
            ;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            // UserFixtures::class,
            ArticleFixture::class,
        ];
    }
}
