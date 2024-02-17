<?php

namespace App\DataFixtures;

use App\Entity\Testimonial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;;

class TestimonialsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $titles = [
            'Super garage',
            'Le meilleur de tous, rien à re dire',
            'J\'ai eu un soucis mais SAV au top',
            'Peut trouver mieux mais je n\'ai pas trouvé',
            'Oui mais ...',
            'Depuis le temps que je cherchai la voiture de mes rêves',
            'Direction assistée...Mais ca c\'était avant'
        ];
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < count($titles); $i++) {
            $equipment = new Testimonial();
            $equipment->setTitle($titles[$i]);
            $equipment->setComment($faker->text());
            $equipment->setCreatedAt($faker->dateTime());
            $equipment->setUserName($faker->name());
            $equipment->setIsPublished(rand(0, 1));
            $manager->persist($equipment);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['testimonials'];
    }
}
