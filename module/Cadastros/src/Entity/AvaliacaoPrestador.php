<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * AvaliacaoPrestador
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="AvaliacaoPrestador")
 *
 */

class AvaliacaoPrestador extends AbstractEntity
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
     * @ORM\ManyToOne(targetEntity="Auth\Entity\oauth_users", inversedBy="id")
     */
    protected $usuario;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $comentario;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $nota;    
    
}
