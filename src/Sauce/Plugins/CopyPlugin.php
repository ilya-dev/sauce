<?php namespace Sauce\Plugins;

class CopyPlugin extends Plugin {

    /**
     * Run a plugin
     *
     * @param string $from
     * @param string $to
     * @return void
     */
    public function run($from, $to)
    {
        $this->filesystem->rewrite($to, $this->filesystem->read($from));
    }

    /**
     * Get the plugin name
     *
     * @return string
     */
    public function getName()
    {
        return 'copy';
    }

}

