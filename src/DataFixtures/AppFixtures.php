<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // Admin 1: admin@admin.com/admin

        $admin1 = new User();
        $admin1->setEmail('admin@admin.com');
        $admin1->setPassword('$2y$13$tTTtcEQhFo7IBLywk8Lqk.UNooc2d/gnCp6yGIIF/lavdPLMEuQLm');
        $admin1->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin1);

        // Admin 2: admin2@admin.com/admin2
        $admin2 = new User();
        $admin2->setEmail('admin2@admin.com');
        $admin2->setPassword('$2y$13$IPb6x8AKXKQpcknAATKD/ehc5aqBgHe0a7hEQgMjWKQmSAeCPViJm');
        $admin2->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin2);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['users'];
    }
}
