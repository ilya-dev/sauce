<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sauce\Task;

class TaskRegistrySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\TaskRegistry');
    }

    function it_registers_a_task(Task $mock)
    {
        $mock->getName()->willReturn('default');

        $this->register($mock);

        $this->getTasks()->shouldReturn([
            'default' => $mock
        ]);
    }

}

