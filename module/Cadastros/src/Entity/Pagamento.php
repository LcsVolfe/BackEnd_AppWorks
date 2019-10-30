<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * Pagamento
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Pagamento")
 *
 */

class Pagamento extends AbstractEntity
{
    
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Servico", mappedBy="pagamento")
     * @var integer
     *
     */
    protected $id;
   
    /**     
     * @ORM\ManyToOne(targetEntity="Auth\Entity\oauth_users", inversedBy="id")
     */
    protected $usuario;

    /**     
     * @ORM\ManyToOne(targetEntity="Cartao", inversedBy="id")
     */
    protected $cartao;
    

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $prestador;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $valor;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $descricao;
    
}
