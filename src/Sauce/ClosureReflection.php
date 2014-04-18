<?php namespace Sauce;

class ClosureReflection {

    /**
     * The closure we work with
     *
     * @var \Closure
     */
    protected $closure;

    /**
     * The constructor
     *
     * @param \Closure $closure
     * @return ClosureReflection
     */
    public function __construct(\Closure $closure)
    {
        $this->closure = $closure;
    }

    /**
     * Execute the closure with a given context
     *
     * @param mixed $context
     * @param array $arguments
     * @return mixed
     */
    public function withContext($context, array $arguments = [])
    {
        $bound = $this->closure->bindTo($context);

        return \call_user_func_array($bound, $arguments);
    }

    /**
     * Get the array of parameters (\ReflectionParameter)
     *
     * @return array
     */
    public function getParameters()
    {
        return (new \ReflectionFunction($this->closure))->getParameters();
    }

    /**
     * Resolve the dependencies out of the given PluginRegistry
     *
     * @param PluginRegistry $registry
     * @return array
     */
    public function resolve(PluginRegistry $registry)
    {
        $parameters = $this->getParameters();

        $iterator = function(\ReflectionParameter $parameter) use($registry)
        {
            return $registry->getPlugin($parameter->getName());
        };

        return \array_map($iterator, $parameters);
    }

}

