<?php

namespace Application\Entity;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository {
    
    public function findByLoginAndPassowrd(Usuario $usuario , $nome , $senha) {
        
        $userLogin = $this->createQueryBuilder('u')
                          ->where("u.nome = '$nome' ")
                          ->getQuery()
                          ->getOneOrNullResult();  
    
        if (!empty($userLogin)) {
            $usuario->setSalt($userLogin->getSalt());
            
            if ($usuario->encryptSenha($senha) == $userLogin->getSenha()) {
                return $userLogin;
            }
        }
        return FALSE;
    }
}
