<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;

use Cadastros\Entity\Plano;
use Doctrine\ORM\EntityManager;

use Logs\Service\LogService;

class PlanoService
{
    const ENTITY = 'Cadastros\Entity\Plano';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        
        $plano = $this->em->find(self::ENTITY, (int) $data['id']);     
        //log
        $src = 'put';
        $alteracao = $plano;   
        if (! $plano) {
            $plano = new Plano();

             //log
             $src = 'post';
             $alteracao = null;
        }
        $plano->setData($data);
        $this->registraLog($plano, $alteracao, $src);
        $this->em->persist($plano);
        $this->em->flush();
    }

    public function fetch($id)
    {
        $uploadItem = $this->em->find(self::ENTITY, $id);

        return $uploadItem->getArrayCopy();
    }


    public function fetchAll($params = null)
    {

        $select = $this->em->createQueryBuilder()->select(
            'Treinamento.id'
        )->from(self::ENTITY, 'Treinamento');

        $result = $select->getQuery()->getArrayResult();

        return $result;
    }


    public function delete($id)
    {
        $parametro = $this->em->find(self::ENTITY, $id);
        $this->registraLog($parametro, null, 'delete');
        $this->em->remove($parametro);
        $this->em->flush();

        return true;
    }


    public function registraLog($original, $alteracao, $tipo_log)
    {        
        $log_service = new LogService( $this->em );
        $log_service->inicializaLog( $original, $alteracao, $tipo_log);
    }
}
