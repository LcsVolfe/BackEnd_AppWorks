<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;

use Cadastros\Entity\Empresa;
use Doctrine\ORM\EntityManager;

use Logs\Service\LogService;

class EmpresaService
{
    const ENTITY = 'Cadastros\Entity\Empresa';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {
        $empresa = $this->em->find(self::ENTITY, (int) $data['id']);
        $contabilidade = $this->em->find('Cadastros\Entity\Contabilidade', (int)$data['Contabilidade']);
        //log
        $src = 'put';
        $alteracao = $empresa;
        if (!$contabilidade) {
            return ["Erro, contabilidade não encontrada"];
        }
        
        if (! $empresa) {
            $empresa = new Empresa();

             //log
             $src = 'post';
             $alteracao = null;
        }
        
        $data['Contabilidade'] = $contabilidade;
        $empresa->setData($data);

        $this->registraLog($empresa, $alteracao, $src);
        $this->em->persist($empresa);
        $this->em->flush();
        
    }

    public function fetch($id)
    {
        $empresa = $this->em->find(self::ENTITY, $id);
        $contabilidade = $this->em->find('Cadastros\Entity\Contabilidade', $empresa->Contabilidade); 
        $plano = $this->em->find('Cadastros\Entity\Plano', $contabilidade->Plano);
        
        $empresa = $empresa->getArrayCopy();
        $contabilidade = $contabilidade->getArrayCopy();
        $plano = $plano->getArrayCopy();
        
        $contabilidade['Plano'] = array_splice($plano,3 ); 
        $empresa['Contabilidade'] = array_splice($contabilidade, 3);

        return $empresa;
    }


    public function fetchAll($params = null)
    {
        $select = $this->em->createQueryBuilder()->select(
            'Empresa.id',
            'Empresa.Nome_Fantasia',
            'Empresa.Cnpj'
        )->from(self::ENTITY, 'Empresa');

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
