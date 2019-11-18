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
 * @ORM\Table(name="Anuncio")
 *
 */

class Anuncio extends AbstractEntity
{

    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     *
     * @var integer
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    protected $descricao;

    /**     
     * @ORM\ManyToOne(targetEntity="Auth\Entity\oauth_users", inversedBy="id")
     */
    protected $usuario;

    
    
    
}
