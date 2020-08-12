<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

/**
 * Class ArticleFixture
 * @package App\DataFixtures
 */
class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 5, function(Article $article) {
            $article
                ->setTitle($this->faker->sentence(6))
                ->setExcerpt($this->faker->paragraph(3))
                ->setContent($this->faker->paragraph(6))
                ->setAuthor(
                    $this->getReference(sprintf('User_%d', $this->faker->numberBetween(0, 1)))
                )
            ;
        });

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
