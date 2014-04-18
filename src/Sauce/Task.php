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

    /**
     * Run the task
     *
     * @param TaskRegistry|null $registry
     * @return void
     */
    public function run(TaskRegistry $registry = null)
    {
        if ($this->dependencies instanceof \Closure)
        {
            $closure = $this->dependencies;

            $closure();
        }

        foreach ($this->dependencies as $dependency)
        {
            $registry->getTask($dependency)->run($registry);
        }
    }

    /**
     * Get the task name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the dependencies
     *
     * @param array|\Closure $dependencies
     * @return void
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * Get the dependencies
     *
     * @return array|\Closure
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

}

