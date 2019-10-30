<?php

namespace Cadastros\Entity;

use Upload\Entity\Uploads;
use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Empresa
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Empresa")
 *
 */

class Empresa extends AbstractEntity
{

    
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Uploads", mappedBy="Empresa")
     * @ORM\OneToMany(targetEntity="oauth_users", mappedBy="Empresa")
     * @var integer
     *
     */
    protected $id;

    /**     
     * @ORM\ManyToOne(targetEntity="Contabilidade", inversedBy="id")
     */
    protected $Contabilidade;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Nome_Fantasia;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Razao_Social;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Cnpj;
    
}
