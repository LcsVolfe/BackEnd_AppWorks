<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_scopes
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_scopes")
 *
 */

class oauth_scopes extends AbstractEntity
{
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $type;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $scope;

    /**
     * @ORM\Column(type="string", length = 2000, nullable=true)
     *
     * @var string
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length = 80, nullable=true)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $is_default;
    
}
