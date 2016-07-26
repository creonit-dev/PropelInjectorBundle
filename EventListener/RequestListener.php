<?php

namespace Creonit\PropelInjectorBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{

    /** @var  ContainerInterface */
    protected $container;

    public function onKernelRequest(GetResponseEvent $event){
        if($event->isMasterRequest()){
            $this->container->get('creonit_propel_injector');
        }
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}