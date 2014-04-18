<?php

if ( ! function_exists('task'))
{
    function task($name, $dependencies)
    {
        $task = new Sauce\Task($name, $dependencies);

        Sauce\TaskRegistry::getInstance()->register($task);
    }
}

