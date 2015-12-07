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
        $login->setAttributes(array(
            'class'    => "form-control ",
            'maxlength' => 100 ,
        ));
        $this->add($login);
  
        $senha = new Password('senha');
        $senha->setAttributes(array(
            'class'  => "form-control ",
        ));
        $this->add($senha);
        
        $button = new Button('submit');
        $button->setLabel('Logar')
               ->setAttributes(array(
                   'type'   => 'submit' ,
                   'class'  => 'btn btn-primary col-sm-12',
               ));
        $this->add($button);
    }
    
}
