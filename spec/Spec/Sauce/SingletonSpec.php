<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SingletonSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Singleton');
    }

    function it_persists_the_instance()
    {
        $this->shouldBeLike(\Sauce\Singleton::getInstance());
    }

}

namespace Sauce;

class Singleton {

    use SingletonTrait;

}

