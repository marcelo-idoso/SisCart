<?php

namespace Auth\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;


class FormLogin extends Form {
    
    public function __construct() {
        
        parent::__construct('login' , array());
        $this->setAttribute('method', 'POST');
        
        
        $login = new Text('login');
        $login->setLabel("Login");
        $this->add($login);
  
        $senha = new Password('senha');
        $senha->setLabel("Senha");
        $this->add($senha);
        
        $button = new Button('submit');
        $button->setLabel('Logar')
               ->setAttributes(array(
                   'type'   => 'submit'
               ));
        $this->add($button);
    }
    
}
