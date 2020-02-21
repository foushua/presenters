<?php

namespace Foushua\Presenters\Traits;

use Exception;
use Foushua\Presenters\Presenters;

trait Presentable
{
    /**
     * @var Presenters
     */
    protected $instance;

    public function present()
    {
        if (is_object($this->instance)) {
            return $this->instance;
        }
        if (property_exists($this, 'presenter') and class_exists($this->presenter)) {
            return $this->instance = new $this->presenter($this);
        }

        throw new Exception('Property $presenter was not set correctly in '.get_class($this));
    }
}
