<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UtilsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Utils');
    }

    function it_combines_two_arrays()
    {
        $this->combine(['foo', 'bar', 'baz'], ['wow', 'so', 'amaze'])->shouldReturn([
            ['foo', 'wow'], ['bar', 'so'], ['baz', 'amaze'],
        ]);

        $this->combine(['foo', 'bar'], 'baz')->shouldReturn([
            ['foo', 'baz'], ['bar', 'baz'],
        ]);

        $this->shouldThrow('InvalidArgumentException')->duringCombine([], null);

        $this->shouldThrow('LogicException')->duringCombine([0], [0, 1]);
    }

}

