<?php namespace Spec\Sauce\Plugins;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\Filesystem;

class ConcatPluginSpec extends ObjectBehavior {

    function let(Filesystem $mock)
    {
        $this->beConstructedWith($mock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Plugins\ConcatPlugin');
    }

    function it_transforms_multiple_files_to_one(Filesystem $mock)
    {
        $mock->read('foo')->willReturn('baz');
        $mock->append('bar', 'baz')->shouldBeCalled();

        $this->run('foo', 'bar');
    }

}

