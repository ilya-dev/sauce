<?php namespace Sauce;

class Task {

    /**
     * The task name
     *
     * @var string
     */
    protected $name;

    /**
     * The dependenc(y/ies)
     *
     * @var array|\Closure
     */
    protected $dependencies;

    /**
     * The constructor
     *
     * @param string $name
     * @param array|\Closure $dependencies
     * @return Task
     */
    public function __construct($name, $dependencies)
    {
        $this->name = $name;

        $this->dependencies = $dependencies;
    }

}

