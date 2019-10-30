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

class CheckEmailService
{
    const ENTITY = 'Cadastros\Entity\oauth\oauth_users';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }   

    public function buscaEmailExistente($email = null)
    {
   
        $email = (string) $_GET['email'];
        $select = $this->em->createQueryBuilder()->select(
            'oauth_users.id',
            'oauth_users.email',
            //'oauth_users.Empresa'
        )->from(self::ENTITY, 'oauth_users')
        ->where("oauth_users.email = :email"); 
        $select->setParameter('email', $email);
        $result = $select->getQuery()->getArrayResult();
        
        return $result;
    }


}
