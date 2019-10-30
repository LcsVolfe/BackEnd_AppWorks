<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;

use Cadastros\Entity\Contabilidade;
use Doctrine\ORM\EntityManager;

use Logs\Service\LogService;

class ContabilidadeService
{
    const ENTITY = 'Cadastros\Entity\Contabilidade';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        
        $contabilidade = $this->em->find(self::ENTITY, (int) $data['id']);      
        $plano = $this->em->find('Cadastros\Entity\Plano', (int)$data['Plano']);
        //log
        $src = 'put';
        $alteracao = $contabilidade;
        if (!$plano) {
            return ["Erro, plano não encontrado"];
        }

        if (! $contabilidade) {
            $contabilidade = new Contabilidade();

             //log
             $src = 'post';
             $alteracao = null;
        }
        $data['Plano'] = $plano;
        $contabilidade->setData($data);
        $this->registraLog($contabilidade, $alteracao, $src);
        $this->em->persist($contabilidade);
        $this->em->flush();
    }

    public function fetch($id)
    {
        $contabilidade = $this->em->find(self::ENTITY, $id); 
        $plano = $this->em->find('Cadastros\Entity\Plano', $contabilidade->Plano);
        
        $contabilidade = $contabilidade->getArrayCopy();
        $plano = $plano->getArrayCopy();
        $contabilidade['Plano'] = array_splice($plano,3 );
        
        return $contabilidade;
    }


    public function fetchAll($params = null)
    {
        $select = $this->em->createQueryBuilder()->select(
            'Contabilidade', 'p.Nome as Plano'
        )->from(self::ENTITY, 'Contabilidade')
        ->innerJoin('Cadastros\Entity\Plano', 'p')
        ->where('Contabilidade.Plano = p.id');
        $result = $select->getQuery()->getArrayResult();

        $ajusteArray = [];
        
        foreach ($result as $key => $value) {
            $newArr = $value[0];            
            $newArr['Plano']= $value['Plano'];
            $ajusteArray[] = $newArr;
        }

        return $ajusteArray;
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
