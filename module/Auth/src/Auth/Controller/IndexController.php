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
                    return $this->redirect()->toRoute('home' ,   array('controller' => 'home' ,'action' => 'index'));
                }else {
                    $mensagem = $auth->authenticate()->getMessages();
                    $this->flashMessenger()->addErrorMessage($mensagem[0]);
                    
                }
               
                
                
            }   
            return new ViewModel(Array(
                'form' => $form ,
                'error' => $this->flashMessenger()->getMessages()
            ));
        }   
        return new ViewModel(Array(
            'form' => $form ,
            'error' => $this->flashMessenger()->getMessages()
        )); 
        
    }
    
    public function logoutAction() {
        $authentication = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $authentication->clearIdentity();
               
        return $this->redirect()->toRoute('login' , array(
                                            'controller' => 'auth' ,
                                            'action' => 'login'));
        
    }
}
