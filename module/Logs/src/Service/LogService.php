<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Logs\Service;

use Logs\Entity\Log;
use Doctrine\ORM\EntityManager;

class LogService
{
    const ENTITY = 'Logs\Entity\Log';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function inicializaLog($original, $alteracao, $tipo_log)
    {
        if ( $tipo_log == 'post' )
        {
            $this->save($original, null, $tipo_log);  
        }
        else if ( $tipo_log == 'put' )
        {
            $this->save($original, $alteracao, $tipo_log);  
        }
        else if ( $tipo_log == 'delete' )
        {
            $this->save($original, null, $tipo_log);  
        }
    }

    public function save($original, $alteracao, $tipo_log)
    {        
        $usuario = $this->em->find('Cadastros\Entity\oauth\oauth_users', 28);

        $log = new Log();
        $logs['Alteracao'] = $alteracao;
        $logs['Original'] = $original;
        $logs['Usuario'] = $usuario;
        $logs['Tipo_Log'] = $tipo_log;
        $logs['Data_Execucao'] = new \Datetime();
        $log->setData($logs);
        $this->em->persist( $log );
    }   
   
}
