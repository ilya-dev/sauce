<?php namespace Sauce;

class Sauce {

    /**
     * Run
     *
     * @param string $task
     * @return void
     */
    public function run($task)
    {
        $this->registerDefaultPlugins();

        $this->loadTaskFile();

        $this->runTask($task);
    }

    /**
     * Register the default plugins
     *
     * @return void
     */
    protected function registerDefaultPlugins()
    {
        PluginRegistry::getInstance()->registerDefaultPlugins();
    }

    /**
     * Load the task file "tasks.php" placed in CWD
     *
     * @return void
     */
    protected function loadTaskFile()
    {
        require \getenv('SAUCE_WORK_DIR').'/tasks.php';
    }

    /**
     * Run a task
     *
     * @param string $task
     * @return void
     */
    protected function runTask($task)
    {
        $task = TaskRegistry::getInstance()->getTask($task);

        $task->setPluginRegistry(PluginRegistry::getInstance());

        $task->run(TaskRegistry::getInstance());
    }

}

