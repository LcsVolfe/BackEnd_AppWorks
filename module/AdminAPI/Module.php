<?php
namespace AdminAPI;

use Core\Authorization\AuthorizationListener;
use ZF\Apigility\Provider\ApigilityProviderInterface;
use \ZF\MvcAuth\MvcAuthEvent;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function onBootstrap(MvcEvent $e)
    {
       $eventManager        = $e->getApplication()->getEventManager();
       $moduleRouteListener = new ModuleRouteListener();
       $moduleRouteListener->attach($eventManager);

       $eventManager->attach(
           MvcAuthEvent::EVENT_AUTHORIZATION,
           new AuthorizationListener,
           100
       );
    }
}
