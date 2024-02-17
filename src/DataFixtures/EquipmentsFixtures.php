<?php

namespace App\DataFixtures;

use App\Entity\Equipments as EntityEquipments;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;;

class EquipmentsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $features = [
            'Assistant au démarrage en côte',
            'Climatisation',
            'Antidémarrage électronique',
            'ABS',
            'Autoradio GPS',
            'Vitres électriques',
            'Direction assistée'
        ];
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < count($features); $i++) {
            $equipment = new EntityEquipments();
            $equipment->setName($features[$i]);
            $equipment->setIsOption(0);
            $equipment->setCreatedAt($faker->dateTimeBetween('-1 week', '+1 week'));
            $equipment->setUpdatedAt($faker->dateTimeBetween('-2 week, -1 week'));
            $manager->persist($equipment);
        }

        $options = [
            'Type de jantes',
            'Finitions chromées',
            'Intérieurs cuir',
        ];

        for ($i = 0; $i < count($options); $i++) {
            $equipment = new EntityEquipments();
            $equipment->setName($options[$i]);
            $equipment->setIsOption(1);
            $equipment->setCreatedAt($faker->dateTimeBetween('-1 week', '+1 week'));
            $equipment->setUpdatedAt($faker->dateTimeBetween('-2 week, -1 week'));
            $manager->persist($equipment);
        }
        $manager->flush();
    }
}
