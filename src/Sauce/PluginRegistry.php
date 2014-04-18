<?php namespace Sauce;

use Sauce\Plugins\Plugin;

class PluginRegistry {

    use SingletonTrait;

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
     * Get a plugin
     *
     * @param string $name
     * @throws \UnexpectedValueException
     * @return Plugins\Plugin
     */
    public function getPlugin($name)
    {
        if ( ! \array_key_exists($name, $this->plugins))
        {
            $message = "Plugin '{$name}' does not exist";

            throw new \UnexpectedValueException($message);
        }

        return $this->plugins[$name];
    }

    /**
     * Register a plugin
     *
     * @param Plugins\Plugin $plugin
     * @return void
     */
    public function register(Plugin $plugin)
    {
        $this->plugins[$plugin->getName()] = $plugin;
    }

    /**
     * Register the default plugins (src/Plugins/plugins.php)
     *
     * @return void
     */
    public function registerDefaultPlugins()
    {
        foreach (require __DIR__.'/Plugins/plugins.php' as $plugin)
        {
            $this->register(new $plugin);
        }
    }

}

