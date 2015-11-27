<?php

namespace Auth\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;
use Auth\Form\FormLoginFilter;

class FormLogin extends Form {
    
    public function __construct() {
        
        parent::__construct('login' , array());
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new FormLoginFilter());
        
        $login = new Text('login');
        $login->setLabel("Login");
        $login->setAttributes(array(
            'maxlength' => 100 ,
        ));
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
