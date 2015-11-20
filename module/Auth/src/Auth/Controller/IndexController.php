<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Auth\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Auth\Form\FormLogin;


class IndexController extends AbstractActionController
{
    public function loginAction()
    {
        $viewModel = new ViewModel();
        
        $form  = new FormLogin();
       
        if ($this->getRequest()->isPost()) {
            $data = $form->getData();
            /**
             * 
             * @var $auth \Zend\Authetication\AutheticationService
             */
            
            $auth = $this->getServiceLocator()
                         ->get('Zend\Authentication\AuthenticationService');
            
            $adapter = $auth->getAdapter;
            $adapter->setLogin($data['login']->setSenha)
            
        }
        
        return $viewModel->setVariables(Array(
            'form' => $form
        )); 
        
    }
}
