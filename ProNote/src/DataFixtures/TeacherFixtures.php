<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Teacher;

class TeacherFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
        
            $teacher = new Teacher();
            $teacher->setFirstName($faker->firstName());
            $teacher->setLastName($faker->lastName());
            $teacher->setBornDate($faker->dateTimeBetween($startDate = '-60 years', $endDate = '-25 years', $timezone = null));
            $teacher->setEmail($faker->freeEmail());
            $teacher->setPhone($faker->e164PhoneNumber());
            $teacher->setAdress($faker->streetAddress());
            $teacher->setZipcode($faker->postcode());
            $teacher->setCity($faker->state()); 
            $teacher->setSubject($faker->randomElement($array = array ('francais', 'histoire', 'maths', 'anglais','musique', 'géographie', 'technologie', 'espagnol')));           

            $manager->persist($teacher);
        }
        
        $manager->flush();
    }
}
