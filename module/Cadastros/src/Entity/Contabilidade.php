<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * Contabilidade
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Contabilidade")
 *
 */

class Contabilidade extends AbstractEntity
{
    
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Empresa", mappedBy="Contabilidade")
     * @ORM\OneToMany(targetEntity="oauth_users", mappedBy="Contabilidade")
     * @var integer
     *
     */
    protected $id;
   
    /**     
     * @ORM\ManyToOne(targetEntity="Plano", inversedBy="id")
     */
    protected $Plano;
    

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
