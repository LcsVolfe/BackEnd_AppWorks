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

use Logs\Service\LogService;
use Cadastros\Entity\oauth\oauth_users;

class UsuarioService
{
    const ENTITY = 'Cadastros\Entity\oauth\oauth_users';
    private $em;
    private $Log_Service;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        

        $usuario = $this->em->find(self::ENTITY, (int) $data['id']);      
        $empresa = $this->em->find('Cadastros\Entity\Empresa', (int)$data['Empresa']);                
        $contabilidade = $this->em->find('Cadastros\Entity\Contabilidade', (int)$data['Contabilidade']);                
        $role = $this->em->find('Cadastros\Entity\oauth\oauth_roles', (int)$data['Role']);                

        //log
        $src = 'put';
        $alteracao = $usuario;

        /*if (!$empresa && !$contabilidade) {
            return ["Erro, empresa ou contabilidade não encontrada"];
        }
        if (!$role) {
            return ["Erro, role não encontrada"];
        }*/
        if (!$usuario) {   
            $usuario = new oauth_users();

            //log
            $src = 'post';
            $alteracao = null;
        }

        $data['Contabilidade'] = $contabilidade;
        $data['Empresa'] = $empresa;
        $data['Role'] = $role;
        $usuario->setData($data);        
        $bcrypt = new Bcrypt();        
        $usuario->password = $bcrypt->create($usuario->password);        
        $this->registraLog($usuario, $alteracao, $src);
        $this->em->persist($usuario);

        $this->em->flush();
    }

    public function fetch($id)
    {
        $usuario = $this->em->find(self::ENTITY, $id);
        $empresa = $this->em->find('Cadastros\Entity\Empresa', $usuario->Empresa);   
        $contabilidade = $this->em->find('Cadastros\Entity\Contabilidade', $empresa->Contabilidade); 
        $plano = $this->em->find('Cadastros\Entity\Plano', $contabilidade->Plano);
        
        $empresa = $empresa->getArrayCopy();
        $contabilidade = $contabilidade->getArrayCopy();
        $plano = $plano->getArrayCopy();
        $usuario = $usuario->getArrayCopy();

        $contabilidade['Plano'] = array_splice($plano,3 ); 
        $empresa['Contabilidade'] = array_splice($contabilidade, 3);
        $usuario['Empresa'] = array_splice($empresa, 3);

        return $usuario;
    }


    public function fetchAll($params = null)
    {       
        $select = $this->em->createQueryBuilder()->select(
            'oauth_users.username',
            'oauth_users.password',
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
