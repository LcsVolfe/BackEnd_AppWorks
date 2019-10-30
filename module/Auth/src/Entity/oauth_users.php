<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_users
 *
 * @category Cadastros
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
     * @ORM\OneToMany(targetEntity="Logs", mappedBy="Usuario")
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
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $email;

    /**
     * @ORM\ManyToOne(targetEntity="oauth_roles", inversedBy="id")
     */
    protected $Role;
    
    
}
