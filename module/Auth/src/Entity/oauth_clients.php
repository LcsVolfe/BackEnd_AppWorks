<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_clients
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_clients")
 *
 */

class oauth_clients extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $client_secret;

    /**
     * @ORM\Column(type="string", length=2000)
     *
     * @var string
     */
    protected $redirect_uri;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     *
     * @var string
     */
    protected $grant_types;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     *
     * @var string
     */
    protected $scope;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    protected $user_id;
    
}
