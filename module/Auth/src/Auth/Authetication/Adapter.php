<?php

namespace Auth\Authetication;

use Doctrine\ORM\EntityManager;
use Application\Entity\Usuario;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;


class Adapter implements AdapterInterface{
   
    protected $em;
    protected $login;
    protected $senha;

    public function __construct(EntityManager $em) {
        $this->em = $em ;
    }        
    function getEm() {
        return $this->em;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEm($em) {
        $this->em = $em;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    
    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */        
    public function authenticate() {
        $user = $this->em
                     ->getRepository('Application\Entity\Usuario')
                     ->findByLoginAndPassowrd(
                             new Usuario()      , 
                             $this->getLogin()  , 
                             $this->getSenha()
                     );
        
        if ($user) {
            return new Result(
                            Result::SUCCESS, 
                            $user , 
                            array()
                        );
        }else {
            return new Result(
                            Result::FAILURE_CREDENTIAL_INVALID, 
                            NULL , 
                            array(
                                'Não foi possível conectar. Login ou senha invalido'
                            )
                        );
        }
        
    }


}
