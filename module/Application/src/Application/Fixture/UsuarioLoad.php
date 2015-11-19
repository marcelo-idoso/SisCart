<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Usuario;

class UsuarioLoad  implements FixtureInterface{
   

    public function load(ObjectManager $manager) {
        
        $usuario = new Usuario();
        $usuario->setName('Marcelo');
        
        $manager->persist($usuario);
        $manager->flush();
    }

}
