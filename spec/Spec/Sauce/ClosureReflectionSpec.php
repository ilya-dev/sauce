<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClosureReflectionSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(function()
        {
            return $this->foo;
        });
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\ClosureReflection');
    }

    function it_invokes_a_closure_with_the_given_context()
    {
        $context = (object) ['foo' => 'Hello, world!'];

        $this->withContext($context)->shouldReturn('Hello, world!');
    }

}

