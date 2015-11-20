<?php

namespace Auth\Authetication\Factory;

use Auth\Authetication\Adapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;

class AutheticationFactory implements FactoryInterface{
    
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
    */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $entityMnager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        return new AuthenticationService(new Session(), new Adapter($entityMnager));
    }

}
