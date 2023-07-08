<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Products;
use Symfony\Component\String\Slugger\SluggerInterface;
use faker;


class ProductsFixtures extends Fixture
{
    public function __construct(private readonly SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($prod =1;$prod <= 10; $prod++){
            $product = new Products();
            $product->setName($faker->word);
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setDescription($faker->text());
            $product->setPrice($faker->randomFloat( 2,900, 15000000));
            $product->setStock($faker->numberBetween(0, 10));

            //on va chercher une réference de categorie
            $category = $this->getReference('cat-'.rand(1,5));
            $product->setCategories($category);
            $manager->persist($product);

            $this->setReference('product_'.$prod, $product);

        }

        $manager->flush();
    }
}
