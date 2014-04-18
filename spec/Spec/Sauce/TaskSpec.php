<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\TaskRegistry;
use Sauce\Task;

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

    function it_runs_the_task(TaskRegistry $registry, Task $task)
    {
        $task->run($registry)->shouldBeCalled(2);

        $registry->getTask('minify_css')->willReturn($task);
        $registry->getTask('minify_js')->willReturn($task);

        $this->run($registry);
    }

}

