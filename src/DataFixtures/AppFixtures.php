<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $offer = new Offer();
            $offer->setTitle('product '.$i)
                ->setType('type '.$i)
                ->setDescription('You can also create multiple fixtures classes '.$i)
                ->setPrice(mt_rand(100, 200));
            $manager->persist($offer);
        }
        $manager->flush();
    }
}
