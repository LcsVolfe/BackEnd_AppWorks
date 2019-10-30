<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Cartao
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Cartao")
 *
 */

class Cartao extends AbstractEntity
{

    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Pagamento", mappedBy="cartao")
     *
     * @var integer
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $numero;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $cvv;
    
    
}
