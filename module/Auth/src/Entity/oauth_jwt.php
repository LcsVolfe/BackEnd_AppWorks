<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_jwt
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_jwt")
 *
 */

class oauth_jwt extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="string", length = 80, nullable=true)
     *
     * @var string
     */
    protected $subject;

    /**
     * @ORM\Column(type="string", length = 2000, nullable=true)
     *
     * @var string
     */
    protected $public_key;    
    
}
