<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Student;

class StudentFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {

            $studend = new Student();
            $studend->setFirstName($faker->firstName());
            $studend->setLastName($faker->lastName());
            $studend->setBornDate($faker->dateTimeBetween($startDate = '-15 years', $endDate = '-11 years', $timezone = null));
            $studend->setClassRoom($faker->randomElement($array = array ('3a', '3b', '3c', '3d', '4a', '4b', '4c', '4d', '5a', '5b', '5c', '5d', '6a', '6b', '6c', '6d')));
            $studend->setEmail($faker->freeEmail());
            $studend->setPhone($faker->e164PhoneNumber());
            $studend->setAdress($faker->streetAddress());
            $studend->setZipcode($faker->postcode());
            $studend->setCity($faker->state());
            $studend->setGender($faker->numberBetween($min = 0, $max = 1));

            $manager->persist($studend);
        }

        $manager->flush();
    }
}
