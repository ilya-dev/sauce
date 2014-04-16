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
     * @return mixed
     */
    public function withContext($context)
    {
        $bound = $this->closure->bindTo($context);

        return $bound();
    }

}

