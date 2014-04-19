<?php namespace Sauce\Plugins;

class MovePlugin extends Plugin {

    /**
     * Run a plugin
     *
     * @param string $from
     * @param string $to
     * @return void
     */
    public function run($from, $to)
    {
        $file = $this->filesystem;

        if ($file->rewrite($to, $file->read($from)))
        {
            $file->remove($from);
        }
    }

    /**
     * Get the plugin name
     *
     * @return string
     */
    public function getName()
    {
        return 'move';
    }

}

