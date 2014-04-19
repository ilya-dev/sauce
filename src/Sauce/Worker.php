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
     * The Filesystem instance
     *
     * @var Filesystem
     */
    protected $file;

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
     * @param Filesystem|null $file
     * @return Worker
     */
    public function __construct(Utils $utils = null, Filesystem $file = null)
    {
        $this->utils  = $utils ?: new Utils;

        $this->file = $file ?: new Filesystem;
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

        return $this;
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

        return $this;
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

        $this->run();
    }

    /**
     * Run
     *
     * @return void
     */
    protected function run()
    {
        $in = $this->in;

        $in = $this->file->isDirectory($in) ? $this->file->getAllFiles($in) : [$in];

        $paths = $this->utils->combine($in, $this->out);

        foreach ($this->plugins as $plugin)
        {
            /**
             * @var Plugins\Plugin $plugin
             */

            foreach ($paths as $from => $to)
            {
                $plugin->run($from, $to);
            }
        }
    }

}

