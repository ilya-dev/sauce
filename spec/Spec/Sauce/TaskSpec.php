<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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

}

