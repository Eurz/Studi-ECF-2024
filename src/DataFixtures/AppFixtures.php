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

        $administrateur = new User();
        $administrateur->setFirstName('Georges');
        $administrateur->setLastName('Parrot');
        $administrateur->setEmail('admin@admin.com');
        $administrateur->setPassword('$2y$13$tTTtcEQhFo7IBLywk8Lqk.UNooc2d/gnCp6yGIIF/lavdPLMEuQLm');
        $administrateur->setRoles(['ROLE_ADMIN']);
        $manager->persist($administrateur);

        // Admin 2: administrateur2@admin.com/administrateur2
        $administrateur2 = new User();
        $administrateur2->setFirstName('Edouard');
        $administrateur2->setLastName('Parrot');
        $administrateur2->setEmail('administrateur2@admin.com');
        $administrateur2->setPassword('$2y$13$IPb6x8AKXKQpcknAATKD/ehc5aqBgHe0a7hEQgMjWKQmSAeCPViJm');
        $administrateur2->setRoles(['ROLE_ADMIN']);
        $manager->persist($administrateur2);

        // Employee: employee@employee.com/employee
        $employee = new User();
        $employee->setFirstName('Jacques');
        $employee->setLastName('Lafougasse');
        $employee->setEmail('employee@employee.com');
        $employee->setPassword('$2y$13$bw2.cXrDKR86PsjrGy8jIeG7bNrZROublrWIjLd9wvPASC8OT5q7O');
        $employee->setRoles(['ROLE_EMPLOYEE']);
        $manager->persist($employee);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['users'];
    }
}
