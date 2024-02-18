<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;;


class ServicesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $titles = [
            'Vidange',
            'Plaques d’immatriculation',
            'Nettoyage',
            'Peut trouver mieuxmais je n\'ai pas trouvé',
            'Entretien périodique',
            'Carrosserie',
            'Parallélisme'
        ];
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < count($titles); $i++) {
            $equipment = new Services();
            $equipment->setTitle($titles[$i]);
            $equipment->setDescription($faker->text(1000));
            $equipment->setExcerpt($faker->text());
            $equipment->setIsPublished(1);
            $manager->persist($equipment);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['services'];
    }
}
