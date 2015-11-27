<?php
namespace Auth\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class FormLoginFilter extends InputFilter{
    
    
    public function __construct() {
       
        // Valida Campo Login
        $login = new Input('login');
        $login->setRequired(TRUE)
              ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $login->getValidatorChain()
                    ->attach(new NotEmpty())
                    ->attach(new StringLength(array(
                                'max' => 100,    
                                'min' => 1 ,
                                'encoding' => 'UTF-8'
                            )));
        $this->add($login);
        
        //Valida o Campo Senha
        $senha = new Input('senha');
        $senha->setRequired(TRUE)
              ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $senha->getValidatorChain()
                ->attach(new NotEmpty())
                ->attach(new StringLength(array('min' => 6 , 'encoding' => 'UTF-8')));
        $this->add($senha);
    }
}
