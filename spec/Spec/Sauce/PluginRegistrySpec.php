<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PluginRegistrySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\PluginRegistry');
    }

    function it_returns_all_registered_plugins()
    {
        $this->getPlugins()->shouldReturn([]);
    }

    function it_registers_the_default_plugins()
    {
        $this->registerDefaultPlugins();

        $plugins = $this->getPlugins();

        $plugins->shouldBeArray();
        $plugins->shouldHaveCount(3);
    }

}

