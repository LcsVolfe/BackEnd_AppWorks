<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Treinamento
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Treinamento")
 *
 */

class Treinamento extends AbstractEntity
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
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Titulo;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Status;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $Descricao;
    
}
