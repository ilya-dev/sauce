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
     * The ClosureReflection instance
     *
     * @var ClosureReflection
     */
    protected $reflector;

    /**
     * The PluginRegistry instance
     *
     * @var PluginRegistry
     */
    protected $plugins;

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

            $parameters = $this->reflector->getParameters();

            if (\count($parameters) > 0)
            {
                $parameters = $this->reflector->resolve($this->plugins);
            }

            \call_user_func_array($closure, $parameters);
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
     * Set the ClosureReflection instance
     *
     * @param ClosureReflection $reflector
     * @return void
     */
    public function setReflector(ClosureReflection $reflector)
    {
        $this->reflector = $reflector;
    }

    /**
     * Set the PluginRegistry instance
     *
     * @param PluginRegistry $plugins
     * @return void
     */
    public function setPluginRegistry(PluginRegistry $plugins)
    {
        $this->plugins = $plugins;
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

