<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;
use Zend\Crypt\Password\Bcrypt;
use Doctrine\ORM\EntityManager;

use Auth\Entity\oauth_users;

class IdentityService
{
    const ENTITY = 'Auth\Entity\oauth_users';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetchAll($params = null)
    {       
        $token =  $_GET['token'];

        $select = $this->em->createQueryBuilder()->select(
            'user.id', 'user.nome', 'user.foto'
        )->from(self::ENTITY, 'user')
        ->innerJoin('Auth\Entity\oauth_access_tokens', 'tk')
        ->where('tk.access_token = :token')
        ->andWhere('tk.user_id = user.username')
        ->setParameter('token', $token);
        
        $result = $select->getQuery()->getArrayResult();   
        if($result[0]['foto'])
            $result[0]['foto'] = base64_encode(stream_get_contents($result[0]['foto']));

        return $result;
        
    }

}
