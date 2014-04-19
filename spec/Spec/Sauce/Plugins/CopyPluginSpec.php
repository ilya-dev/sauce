<?php namespace Spec\Sauce\Plugins;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\Filesystem;

class CopyPluginSpec extends ObjectBehavior {

    function let(Filesystem $mock)
    {
        $this->beConstructedWith($mock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Plugins\CopyPlugin');
    }

    function it_makes_a_copy_of_file(Filesystem $mock)
    {
        $mock->read('foo')->willReturn('bar');
        $mock->rewrite('baz', 'bar')->shouldBeCalled();

        $this->run('foo', 'baz');
    }

}

