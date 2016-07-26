<?php

namespace Creonit\PropelInjectorBundle\Behavior;

use Propel\Generator\Model\Behavior;

class PropelInjectorBehavior extends Behavior
{

    public function objectMethods($builder)
    {
        return $this->renderTemplate('objectMethods');
    }

}