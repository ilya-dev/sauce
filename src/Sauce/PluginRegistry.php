<?php namespace Sauce;

class PluginRegistry {

    /**
     * The registered plugins
     *
     * @var array
     */
    protected $plugins = [];

    /**
     * Get all registered plugins
     *
     * @return array
     */
    public function getPlugins()
    {
        return $this->plugins;
    }

    /**
     * Register the default plugins (src/Plugins/plugins.php)
     *
     * @return void
     */
    public function registerDefaultPlugins()
    {
        $this->plugins = \array_merge($this->plugins, require __DIR__.'/Plugins/plugins.php');
    }

}

