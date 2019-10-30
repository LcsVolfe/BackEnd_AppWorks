<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_users
 *
 * @category  Auth
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_users")
 *
 */

class oauth_users extends AbstractEntity
{
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer", name = "id")
     * @ORM\OneToMany(targetEntity="Logs\Entity\Logs", mappedBy="usuario")
     * @ORM\OneToMany(targetEntity="Pagamento", mappedBy="pagamento")
     * @ORM\OneToMany(targetEntity="Cadastros\Entity\AvaliacaoPrestador", mappedBy="usuario")
     * @ORM\OneToMany(targetEntity="Cadastros\Entity\EspecialidadePrestador", mappedBy="usuario")
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
    protected $username;

    /**
     * @ORM\Column(type="string", length=2000)
     *
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=15)
     *
     * @var string
     */
    protected $cpf;

    /**
     * @ORM\Column(type="integer")
     *
     * @var string
     */
    protected $telefone;

    /**
     * @ORM\Column(type="integer")
     *
     * @var string
     */
    protected $cep;

    /**
     * @ORM\Column(type="string", length=40)
     *
     * @var string
     */
    protected $cidade;

    /**
     * @ORM\Column(type="string", length=40)
     *
     * @var string
     */
    protected $estado;

    /**
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $bairro;

    /**
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $rua;

    /**
     * @ORM\Column(type="integer")
     *
     * @var string
     */
    protected $numero;

    /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string
     */
    protected $complemento;

    /**
     * @ORM\Column(type="string", length=140)
     *
     * @var string
     */
    protected $foto;


    /**
     * @ORM\ManyToOne(targetEntity="oauth_roles", inversedBy="id")
     */
    protected $role;


    /**
     * @ORM\ManyToOne(targetEntity="Cadastros\Entity\Pagamento", inversedBy="id")
     */
    protected $pagamento;

    /**
     * @ORM\ManyToOne(targetEntity="Cadastros\Entity\Servico", inversedBy="id")
     */
    protected $servico;
    
    
}
