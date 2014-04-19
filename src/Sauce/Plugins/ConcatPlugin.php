<?php namespace Sauce\Plugins;

class ConcatPlugin extends Plugin {

    /**
     * Run a plugin
     *
     * @param string $from
     * @param string $to
     * @return void
     */
    public function run($from, $to)
    {
        $this->filesystem->append($to, $this->filesystem->read($from));
    }

    /**
     * Get the plugin name
     *
     * @return string
     */
    public function getName()
    {
        return 'concat';
    }

}

