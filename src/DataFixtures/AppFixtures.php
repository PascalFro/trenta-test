<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr-FR');

        // Nous gérons les produits
        for($i = 01; $i <= 30; $i++) {
          $product = new Product();

          $title = $faker->sentence();
          $description = '<p>' . join('</p><p>', $faker->paragraphs(2)) . '</p>';
          $image = $faker->imageUrl($width = 320, $height = 240);

          $product->setTitle($title)
                  ->setDescription($description)
                  ->setImage($image)
                  ->setPrice(mt_rand(10,150));

          $manager->persist($product);
        }

        $manager->flush();
    }
}
