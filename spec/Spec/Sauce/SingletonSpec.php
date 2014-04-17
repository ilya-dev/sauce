<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SingletonSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Singleton');
    }

}

namespace Sauce;

class Singleton {

    use SingletonTrait;

}

