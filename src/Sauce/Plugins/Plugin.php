<?php namespace Sauce\Plugins;

use Sauce\Filesystem;

abstract class Plugin {

    /**
     * The plugin settings
     *
     * @var array
     */
    protected $settings = [];

    /**
     * The Filesystem instance
     *
     * @var \Sauce\Filesystem
     */
    protected $filesystem;

    /**
     * The constructor
     *
     * @param \Sauce\Filesystem|null $filesystem
     * @return Plugin
     */
    public function __construct(Filesystem $filesystem = null)
    {
        $this->filesystem = $filesystem ?: new Filesystem;
    }

    /**
     * Get the plugin name
     *
     * @return string
     */
    public abstract function getName();

    /**
     * Run a plugin
     *
     * @param string $from
     * @param string $to
     * @return void
     */
    public abstract function run($from, $to);

    /**
     * Gets called when the object is called as a function
     *
     * @param array $settings
     * @return mixed
     */
    public function __invoke(array $settings = [])
    {
        $this->settings = $settings;

        return $this;
    }

}

