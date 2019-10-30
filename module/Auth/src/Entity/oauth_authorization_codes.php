<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_authorization_codes
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_authorization_codes")
 *
 */

class oauth_authorization_codes extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=40 )
     *
     * @var string
     */
    protected $authorization_code;

    /**
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     *
     * @var string
     */
    protected $user_id;

    /**
     * @ORM\Column(type="string", nullable=true, length=2000)
     *
     * @var string
     */
    protected $redirect_uri;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var datetime
     */
    protected $expires;

    /**
     * @ORM\Column(type="string", nullable=true, length=2000)
     *
     * @var string
     */
    protected $scope;

    /**
     * @ORM\Column(type="string", nullable=true, length=2000)
     *
     * @var string
     */
    protected $id_token;
    
}
