<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PluginRegistrySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\PluginRegistry');
    }



}

