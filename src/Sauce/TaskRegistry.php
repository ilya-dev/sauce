<?php namespace Sauce;

class TaskRegistry {

    use SingletonTrait;

    /**
     * The tasks stored
     *
     * @var array
     */
    protected $tasks = [];

    /**
     * Register a task
     *
     * @param Task $task
     * @return void
     */
    public function register(Task $task)
    {
        $this->tasks[$task->getName()] = $task;
    }

    /**
     * Get all the tasks
     *
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Get a task
     *
     * @throws \UnexpectedValueException
     * @param string $name
     * @return Task
     */
    public function getTask($name)
    {
        if ( ! \array_key_exists($name, $this->tasks))
        {
            $message = "Task '{$name}' does not exist";

            throw new \UnexpectedValueException($message);
        }

        return $this->tasks[$name];
    }

}

