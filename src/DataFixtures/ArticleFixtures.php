<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=1 ;$i<=10;$i++){
            $article =new Article();
            $article->setTitle("Titre de l'article n°");
            $article->setContent("Contenu d'un article");
            $article->setImage('http://via.placeholder.com/350x150');
            $article->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }

        $manager->flush();
    }
}
