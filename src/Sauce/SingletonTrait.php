<?php namespace Sauce;

trait SingletonTrait {

    /**
     * The stored instance
     *
     * @var mixed
     */
    protected $instance;

    /**
     * Get the stored instance
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if ( ! ($this->instance instanceof static))
        {
            $this->instance = new static;
        }

        return $this->instance;
    }

}

