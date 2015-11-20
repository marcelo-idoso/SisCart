<?php

namespace Auth\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;

class AutheticationFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $entityMnager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        return new AuthenticationService(new Session(), new Adapter($entityMnager));
    }

}
