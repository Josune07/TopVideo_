<?php
// src/DataFixtures/VideoFixtures.php
namespace App\DataFixtures;

use Blogger\BlogBundle\Entity\Categoria;
use Blogger\BlogBundle\Entity\Video;
use Blogger\BlogBundle\Entity\Plataforma;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture

{
    public function load(ObjectManager $manager)
    {

         //Categorias
        for ($i = 0; $i < 7; $i++) {
        $cat = new Categoria();
        $cat->setNombre('categoria'.$i);
        $manager->persist($cat);
        $this->addReference(('categoria'.$i), $cat);
        }
        $manager->flush();


        

        //Plataformas
        for ($i = 0; $i < 7; $i++) {
            $plataform = new Plataforma();
            $plataform->setNombre('nombre'.$i);
            $plataform->setImagen('imagen'.$i);
            $manager->persist($plataform);
            $this->addReference(('plataforma'.$i), $plataform);
        }
        
        $manager->flush();


//Videos
        for ($i = 0; $i < 7; $i++) {
            $video = new Video();
            $video->setTitulo('video '.$i);
            $video->setCategoria($this->getReference('categoria'.$i));
            $video->setCantante('cantante '.$i);
                $int = mt_rand(1262055681, 1562055681);
                $string = date("Y-m-d H:i:s", $int);
                $date = new \DateTime($string);
            $video->setDate($date);
            $video->setLetra('lalalaaa'.$i);
            $video->setLink('link'.$i);
            $video->addPlataforma($this->getReference('plataforma'.$i));
            $manager->persist($video);
            $this->addReference(('video '.$i), $video);
        }

        $manager->flush();

       
    }

    
    
}