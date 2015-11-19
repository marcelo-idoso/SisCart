<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;
use Application\Entity\Usuario;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $entitymanager = $this->getServiceLocator()
                     ->get('Doctrine\ORM\EntityManager');
        $user = $entitymanager->getRepository('Application\Entity\Usuario')
                              ->findByLoginAndPassowrd(
                                      new Usuario() , 
                                      'Marcelo',
                                      '123456789'
                            );
        echo "<pre>";
        var_dump($user);
        echo "</pre>";
        die;
        return new ViewModel();
    }
}
