<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

use Cadastros\Entity\oauth\oauth_users;
 

/**
 *
 * oauth_roles
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_roles")
 *
 */

class oauth_roles extends AbstractEntity
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
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $role;  
    
}
