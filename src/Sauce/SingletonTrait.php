<?php namespace Sauce;

trait SingletonTrait {

    /**
     * The stored instance
     *
     * @var mixed
     */
    protected static $instance;

    /**
     * Get the stored instance
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if ( ! (static::$instance instanceof static))
        {
            static::$instance = new static;
        }

        return static::$instance;
    }

}

