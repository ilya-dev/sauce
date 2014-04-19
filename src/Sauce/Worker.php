<?php namespace Sauce;

use Sauce\Plugins\Plugin;

class Worker {

    /**
     * The Utils instance
     *
     * @var Utils
     */
    protected $utils;

    /**
     * The plugins you want to use
     *
     * @var array
     */
    protected $plugins = [];

    /**
     * The input path (list)
     *
     * @var array
     */
    protected $in;

    /**
     * The output path
     *
     * @var string
     */
    protected $out;

    /**
     * The constructor
     *
     * @param Utils|null $utils
     * @return Worker
     */
    public function __construct(Utils $utils = null)
    {
        $this->utils  = $utils ?: new Utils;
    }

    /**
     * Select files you want to work with, start a chain
     *
     * @param string $path
     * @return self
     */
    public function in($path)
    {
        $this->in = $path;
    }

    /**
     * "Pipe" the input through the given plugin
     *
     * @param Plugins\Plugin $plugin
     * @return self
     */
    public function pipe(Plugin $plugin)
    {
        $this->plugins[] = $plugin;
    }

    /**
     * Perform writing, end the chain
     *
     * @param string $path
     * @return void
     */
    public function out($path)
    {
        $this->out = $path;
    }

}

