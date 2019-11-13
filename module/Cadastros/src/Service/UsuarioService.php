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
use Logs\Service\LogService;

class UsuarioService
{
    const ENTITY = 'Auth\Entity\oauth_users';
    private $em;
    private $Log_Service;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        

        $usuario = $this->em->find(self::ENTITY, (int) $data['id']);          
                    
        if (!$usuario) {   
            $usuario = new oauth_users();

            //log
            $src = 'post';
            $alteracao = null;
        }
    
        $data['data_nascimento'] = new \DateTime($data['data_nascimento']);
        $usuario->setData($data);        
        $bcrypt = new Bcrypt();        
        $usuario->password = $bcrypt->create($usuario->password);        
        $this->em->persist($usuario);

        $this->em->flush();
    }

    public function fetch($id)
    {
        $usuario = $this->em->find(self::ENTITY, $id);
        
        $usuario = $usuario->getArrayCopy();
        

        return $usuario;
    }


    public function fetchAll($params = null)
    {       
        $select = $this->em->createQueryBuilder()->select(
            'oauth_users'
        )->from(self::ENTITY, 'oauth_users');

        $result = $select->getQuery()->getArrayResult();     
        
        return $result;
    }


    public function delete($id)
    {
        $parametro = $this->em->find(self::ENTITY, $id);
        $this->em->remove($parametro);
        $this->registraLog($parametro, null, 'delete');
        $this->em->flush();

        return true;
    }

    public function registraLog($original, $alteracao, $tipo_log)
    {        
        $log_service = new LogService( $this->em );
        $log_service->inicializaLog( $original, $alteracao, $tipo_log);
    }
}
