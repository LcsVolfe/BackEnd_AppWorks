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

use Cadastros\Entity\oauth\oauth_users;

class IdentityService
{
    const ENTITY = 'Cadastros\Entity\oauth\oauth_access_tokens';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetchAll($params = null)
    {       
        $token = (string) $_GET['token'];
                
        
        $select = $this->em->createQueryBuilder()->select(            
            'tk.user_id', 'tk.expires',
            "(case when user.Empresa is NULL THEN NULLIF(1,1) ELSE e.id  END) as empresa ",
            "(case when user.Contabilidade is NULL THEN NULLIF(1,1) ELSE c.id  END) as contabilidade "
        )
        ->from('Cadastros\Entity\oauth\oauth_users', 'user') 
        ->innerJoin('Cadastros\Entity\oauth\oauth_access_tokens', 'tk')

        ->innerJoin('Cadastros\Entity\Empresa', 'e')
        ->innerJoin('Cadastros\Entity\Contabilidade', 'c')
        ->where('tk.access_token = :token')
        ->andWhere('tk.user_id = user.username')
        /*->andWhere("
            (user.Empresa is not NULL AND user.Empresa = e.id) 
            OR 
            (user.Contabilidade is not NULL AND user.Contabilidade = c.id)"
        )*/
        //->andWhere('e.id = user.Empresa OR c.id = user.Contabilidade')
        ->setParameter('token', $token);

        $resultado = $select->getQuery()->getArrayResult();   
        return $resultado[0];
    }

}
