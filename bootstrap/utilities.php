<?php

/**
 * Get an array of attributes using a model factory builder for a given class, name, and attributes.
 *
 * @param  dynamic  class|class,name|class,attributes|class,name,attributes
 * @return \Illuminate\Database\Eloquent\FactoryBuilder
 */
function attributes()
{
    $factory = app('Illuminate\Database\Eloquent\Factory');

    $arguments = func_get_args();

    if (isset($arguments[1]) && is_string($arguments[1])) {
        return $factory->raw($arguments[0], [], $arguments[1]);
    }

    if (isset($arguments[1]) && is_array($arguments[1])) {
        $attrs = $factory->raw($arguments[0], $arguments[1], isset($arguments[2]) ? $arguments[2] : 'default');
        return array_merge($attrs, $arguments[1]);
    }

    return $factory->raw($arguments[0]);
}
