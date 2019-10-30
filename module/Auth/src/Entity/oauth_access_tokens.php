<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_access_tokens
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_access_tokens")
 *
 */

class oauth_access_tokens extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length = 40)
     *
     * @var string
     */
    protected $access_token;

    /**
     * @ORM\Column(type="string", length = 80)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="string", length = 255)
     *
     * @var string
     */
    protected $user_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var datetime
     */
    protected $expires;

    /**
     * @ORM\Column(type="string", nullable=true, length = 2000)
     *
     * @var string
     */
    protected $scope;
    
}
