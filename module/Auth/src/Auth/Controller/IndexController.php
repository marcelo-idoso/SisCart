<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Auth\Controller;

use Auth\Authetication\Adapter;
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
            
            $form->setData($this->getRequest()->getPost()->toArray());
            
            if ($form->isValid()){
                $data = $form->getData();
               
                $auth = $this->getServiceLocator()
                             ->get('Zend\Authentication\AuthenticationService');
            
                $adapter = $auth->getAdapter();
                    
                $adapter->setLogin($data['login']);
                       $adapter->setSenha($data['senha']);
                
                if ($auth->authenticate()->isValid()) {
                    return $this->redirect()->toRoute('home' , 
                            array('controller' => 'home' ,
                                'action' => 'index'));
                }
                
                $mensagem = $auth->authenticate()->getMessages();
                $this->flashMessenger()->addErrorMessage($mensagem);
                
            }   
        
        }   
        return $viewModel->setVariables(Array(
            'form' => $form
        )); 
        
    }
}
