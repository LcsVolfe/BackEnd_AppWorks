<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;

use Cadastros\Entity\Treinamento;
use Doctrine\ORM\EntityManager;

use Logs\Service\LogService;

class TreinamentoService
{
    const ENTITY = 'Cadastros\Entity\Treinamento';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        
        $treinamento = $this->em->find(self::ENTITY, (int) $data['id']); 

        //log
        $src = 'put';
        $alteracao = $treinamento;

        if (! $treinamento) {
            $treinamento = new Treinamento();

            //log
            $src = 'post';
            $alteracao = null;
        }
        $treinamento->setData($data);
        $this->registraLog($treinamento, $alteracao, $src);
        $this->em->persist($treinamento);
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
