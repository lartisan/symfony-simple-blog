<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userData = [
            ["username" => "admin", "email" => "admin@example.com", "roles" => ["ROLE_SUPER_ADMIN"]],
            ["username" => "moderator", "email" => "moderator@example.com", "roles" => ["ROLE_MODERATOR"]],
            ["username" => "user", "email" => "user@example.com", "roles" => ["ROLE_USER"]],
        ];

        foreach ($userData as $i => $data) {
            $user = new User();
            $user->setUsername($data["username"])
                ->setEmail($data["email"])
                ->setPlainPassword('parola123')
                ->setRoles($data["roles"])
                ->setEnabled(true)
            ;

            $manager->persist($user);

            $manager->flush();

            $this->addReference('User_' . $i, $user);
        }
    }
}
