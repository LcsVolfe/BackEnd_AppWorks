<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Plano
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Plano")
 *
 */

class Plano extends AbstractEntity
{

    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Contabilidade", mappedBy="Plano")
     *
     * @var integer
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Nome;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Descricao;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer 
     */
    protected $Limite_De_Empresas;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $Preco;
    
}
