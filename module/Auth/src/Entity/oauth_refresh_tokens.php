<?php

namespace Auth\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * oauth_refresh_tokens
 *
 * @category Cadastros
 * @package  Entity
 * @author   
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_refresh_tokens")
 *
 */

class oauth_refresh_tokens extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=40)
     *
     * @var string
     */
    protected $refresh_token;

    /**
     * @ORM\Column(type="string", length=80)
     *
     * @var string
     */
    protected $client_id;

    /**
     * @ORM\Column(type="string", length = 255, nullable=true)
     *
     * @var string
     */
    protected $user_id;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var datetime
     */
    protected $expires;

    /**
     * @ORM\Column(type="string", length = 2000, nullable=true)
     *
     * @var string
     */
    protected $scope;
    
}
