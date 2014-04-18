<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\TaskRegistry;
use Sauce\Task;
use Sauce\PluginRegistry;
use Sauce\ClosureReflection;

class TaskSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('default', ['minify_css', 'minify_js']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Task');
    }

    function it_sets_and_returns_the_dependencies()
    {
        $this->setDependencies(function() {});

        $this->getDependencies()->shouldHaveType('Closure');
    }

    function it_runs_the_task(
        TaskRegistry $tasks, Task $task,
        PluginRegistry $plugins, ClosureReflection $reflector
    )
    {
        // case #1: task("name", [...])
        $task->run($tasks)->shouldBeCalled(2);

        $tasks->getTask('minify_css')->willReturn($task);
        $tasks->getTask('minify_js')->willReturn($task);

        $this->run($tasks);

        // case #2: task("name", function(void) { ... })
        $this->setDependencies(function()
        {
            throw new \Exception('Catch me, mister');
        });

        $this->shouldThrow('Exception')->duringRun();

        // case #3: task("name", function($someDependency) { ... })
        $reflector->resolve($plugins)->willReturn(['foo']);

        $this->setDependencies(function($foo)
        {
            throw $foo;
        });

        $this->shouldThrow('Exception')->duringRun();
    }

}

