<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categories;
use Symfony\Component\String\Slugger\SluggerInterface;


class CategoriesFixtures extends Fixture
{
    private $counter = 1;
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Voiture' , null, $manager);



         $this->createCategory('Ethanol', $parent, $manager);
            $this->createCategory('Electrique', $parent, $manager);
            $this->createCategory('Essence', $parent, $manager);
            $this->createCategory('Diesel', $parent, $manager);
            $this->createCategory('Hybride', $parent, $manager);


         $manager->flush();
    }
    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager): Categories
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
