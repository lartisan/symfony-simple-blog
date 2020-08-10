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

        foreach ($userData as $data) {
            $user = new User();
            $user->setUsername($data["username"]);
            $user->setEmail($data["email"]);
            // $user->setPassword('$2y$13$V99J0qg18G3hN/yqbhCZOeFfcDKDRJ6740Nir/8LtDpzcT8lZCrRu');
            $user->setPlainPassword('parola123');
            $user->setRoles($data["roles"]);
            $user->setEnabled(true);
            $manager->persist($user);

            $manager->flush();
        }
    }
}
