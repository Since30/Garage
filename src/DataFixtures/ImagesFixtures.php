<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Images;
use Faker;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($img =1; $img <= 10; $img++){
            $image = new Images();
            $image->setName($faker->image(null,640,480));
            $product = $this->getReference('product_'.rand(1,10));
            $image->setProducts($product);

            $manager->persist($image);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return[
            ProductsFixtures::class
        ];
    }
}
