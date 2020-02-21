<?php

namespace Foushua\Presenters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Presenters
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $property
     *
     * @return bool
     */
    public function __isset($property)
    {
        return method_exists($this, Str::camel($property));
    }

    /**
     * @param string $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        $property = Str::camel($property);
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->model->{Str::snake($property)};
    }
}
