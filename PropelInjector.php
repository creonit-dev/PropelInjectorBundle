<?php

namespace Creonit\PropelInjectorBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class PropelInjector implements ContainerInterface
{

    /** @var  ContainerInterface */
    protected $container;

    /** @var  PropelInjector */
    protected static $instance;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        static::$instance = $this;
    }


    /**
     * @return PropelInjector
     */
    public static function getInstance(){
        return static::$instance;
    }

    /**
     * Sets a service.
     *
     * @param string $id The service identifier
     * @param object $service The service instance
     * @throws \Exception
     */
    public function set($id, $service)
    {
        throw new \Exception('Method "set" not allowed');
    }

    /**
     * Gets a service.
     *
     * @param string $id The service identifier
     * @param int $invalidBehavior The behavior when the service does not exist
     *
     * @return object The associated service
     *
     * @throws ServiceCircularReferenceException When a circular reference is detected
     * @throws ServiceNotFoundException          When the service is not defined
     *
     * @see Reference
     */
    public function get($id, $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE)
    {
        return $this->container->get($id, $invalidBehavior);
    }

    /**
     * Returns true if the given service is defined.
     *
     * @param string $id The service identifier
     *
     * @return bool true if the service is defined, false otherwise
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * Check for whether or not a service has been initialized.
     *
     * @param string $id
     *
     * @return bool true if the service has been initialized, false otherwise
     */
    public function initialized($id)
    {
        return $this->container->initialized($id);
    }

    /**
     * Gets a parameter.
     *
     * @param string $name The parameter name
     *
     * @return mixed The parameter value
     *
     * @throws InvalidArgumentException if the parameter is not defined
     */
    public function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    /**
     * Checks if a parameter exists.
     *
     * @param string $name The parameter name
     *
     * @return bool The presence of parameter in container
     */
    public function hasParameter($name)
    {
        return $this->container->hasParameter($name);
    }

    /**
     * Sets a parameter.
     *
     * @param string $name The parameter name
     * @param mixed $value The parameter value
     * @throws \Exception
     */
    public function setParameter($name, $value)
    {
        throw new \Exception('Method "setParameter" not allowed');
    }
}