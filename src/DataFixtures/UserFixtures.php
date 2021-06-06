<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class UserFixtures extends Fixture
{
    private $encoder;

    public function load(ObjectManager $manager)
    {
     
       for ($i=0; $i<= 5; $i++){
           $user = new Users();
           
           $user -> setName("test");
           $user -> setEmail("test@test");
           $user -> setPhoneNumber(12333567);
           $user -> setPassword('pass_1234');
            $manager -> persist($user);
       }

        $manager->flush();
    }
}
