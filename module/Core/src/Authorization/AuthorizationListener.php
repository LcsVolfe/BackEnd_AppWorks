<?php

namespace Core\Authorization;

use \ZF\MvcAuth\MvcAuthEvent;


class AuthorizationListener
{

    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        /** @var \ZF\MvcAuth\Authorization\AclAuthorization $authorization */
        $authorization = $mvcAuthEvent->getAuthorizationService();
        $allResources = $mvcAuthEvent->getAuthorizationService()->getResources();
        /**
         * @var ServiceManager
         */
        $sm = $mvcAuthEvent->getMvcEvent()->getApplication()->getServiceManager();

        /**
         * Get Identity and current scope
         */

        $identity = $mvcAuthEvent->getIdentity()->getAuthenticationIdentity();
        $userId = $identity['user_id'];

        /**
         * @var ZendDbAdapter
         */
        $db = $sm->get('oauth_adapter');

        $query = $db->query("    
            select role 
            from oauth_roles 
            inner join oauth_users 
            on oauth_roles.id = oauth_users.Role_id
            and  oauth_users.username = :user "
        );
        $resultSet = $query->execute(['user' => $userId]);
        $roles = [];

        foreach ($resultSet as $r)
            $roles[] = $r['role'];


        /**
         * Deny all resources
         */
        //$authorization->deny();

        /**
         * Allow request to get oAuth token
         */
        $authorization->addResource('ZF\OAuth2\Controller\Auth::token');
        $authorization->allow(null, 'ZF\OAuth2\Controller\Auth::token');

        /**
         * Set current scope as role user
         */
        if (count($roles) > 0) {
            $authorization->addRole($userId);
            /**
             * get resources by roles
             */

            $resources = [];

            foreach ($roles as $role)
                $resources = array_merge($this->getResourcesByRole($role, $allResources), $resources);

            /**
             * set resources by user
             */
            foreach ($resources as $resource => $verbs) {

                foreach ($verbs as $verb)
                    $authorization->allow($userId, $resource, $verb);
            }
        }
    }

    /**
     * @param string $role
     * @return array
     */
    private function getResourcesByRole($role, $allResources)
    {

        $admin = [];

        foreach ($allResources as $r)
            $admin[$r] = ['GET', 'POST', 'PUT', 'DELETE'];

        $resources = [
            'admin' => $admin,
            /*'xxxx' => [
                'AdminApi\V1\Rest\Teste\Controller::collection' => ['GET', 'POST'],
            ],
            'yyyy-professor' => [
                'yyyyyy::collection' => ['GET', 'POST'],
                'yyyy::collection' => ['GET', 'POST'],
            ]*/
        ];

        return $resources[$role];
    }

}