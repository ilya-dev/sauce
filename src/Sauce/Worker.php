<?php namespace Sauce;

use Sauce\Plugins\Plugin;

class Worker {

    /**
     * Select files you want to work with, start a chain
     *
     * @param string $path
     * @return self
     */
    public function in($path)
    {

    }

    /**
     * "Pipe" the input through the given plugin
     *
     * @param Plugins\Plugin $plugin
     * @return self
     */
    public function pipe(Plugin $plugin)
    {

    }

    /**
     * Perform writing, end the chain
     *
     * @param string $path
     * @return void
     */
    public function out($path)
    {

    }

}

