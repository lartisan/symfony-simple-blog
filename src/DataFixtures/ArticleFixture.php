<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function(Article $article) {
            $article
                ->setTitle($this->faker->sentence(6))
                ->setExcerpt($this->faker->paragraph(3))
                ->setContent($this->faker->paragraph(6))
                ->setAuthor(
                    $this->getReference(sprintf('user.%d', $this->faker->numberBetween(0, 1)))
                )
            ;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
