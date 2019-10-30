<?php

namespace Cadastros\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Servico
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="Servico")
 *
 */

class Servico extends AbstractEntity
{

    
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="oauth_users", mappedBy="servico")
     * @var integer
     *
     */
    protected $id;

    /**     
     * @ORM\ManyToOne(targetEntity="Pagamento", inversedBy="id")
     */
    protected $pagamento;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $descricao;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $avaliacao_descricao;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $avaliacao_nota;
    
}
