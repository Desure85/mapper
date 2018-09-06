<?php

namespace Tarantool\Mapper;
/**
 * Class Closure
 *
 * @see \Closure
 */
class Closure
{
    /**
     * @see \Closure::fromCallable()
     * @param callable $callable
     * @return \Closure
     */
    public static function fromCallable(callable $callable): callable
    {
        // In case we've got it native, let's use that native one!
        if(method_exists(\Closure::class, 'fromCallable')) {
            return \Closure::fromCallable($callable);
        }

        return function () use ($callable) {
            return \call_user_func_array($callable, \func_get_args());
        };
    }
}