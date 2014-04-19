<?php namespace Spec\Sauce\Plugins;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\Filesystem;

class MovePluginSpec extends ObjectBehavior {

    function let(Filesystem $mock)
    {
        $this->beConstructedWith($mock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Plugins\MovePlugin');
    }

    function it_moves_a_file_to_another_location(Filesystem $mock)
    {
        $mock->read('foo')->willReturn('bar');
        $mock->rewrite('baz', 'bar')->willReturn(false);
        $mock->remove('foo')->shouldNotBeCalled();

        $this->run('foo', 'baz');

        $mock->rewrite('baz', 'bar')->willReturn(10);
        $mock->remove('foo')->shouldBeCalled();

        $this->run('foo', 'baz');
    }

}

