<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;

use Cadastros\Entity\oauth\oauth_users;
use Doctrine\ORM\EntityManager;

class CheckUserNameService
{
    const ENTITY = 'Cadastros\Entity\oauth\oauth_users';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }   

    public function buscaUsuarioExistente($new_user = null)
    {
   
        $new_user = (string) $_GET['new_user'];
        $select = $this->em->createQueryBuilder()->select(
            'oauth_users.id',
            'oauth_users.username'
            //'oauth_users.Empresa'
        )->from(self::ENTITY, 'oauth_users')
        ->where("oauth_users.username = :new_user"); 
        $select->setParameter('new_user', $new_user);
        $result = $select->getQuery()->getArrayResult();
        
        return $result;
    }


}
