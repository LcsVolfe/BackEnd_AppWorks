<?php

namespace Logs\Entity;

//use Upload\Entity\Uploads;
use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Log
 *
 * @category Logs
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Logs")
 *
 */

class Log extends AbstractEntity
{
  
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @var integer
     *
     */
    protected $id;

    /**     
     * @ORM\ManyToOne(targetEntity="Cadastros\Entity\oauth\oauth_users", inversedBy="id")
     */
    protected $Usuario;

    /**
     * @ORM\Column(type = "date")
     *
     * @var date
     */
    protected $Data_Execucao;

    /**
     * @ORM\Column(type="object")
     *
     * @var string
     */
    protected $Original;

    /**
     * @ORM\Column(type="object")
     *
     * @var string
     */
    protected $Alteracao;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Tipo_Log;
    
}
