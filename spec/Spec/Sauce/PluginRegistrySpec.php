<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sauce\Plugins\Plugin;

class PluginRegistrySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\PluginRegistry');
    }

    function it_returns_all_registered_plugins()
    {
        $this->getPlugins()->shouldReturn([]);
    }

    function it_registers_a_plugin(Plugin $mock)
    {
        $mock->getName()->willReturn('foo');

        $this->register($mock);

        $this->getPlugins()->shouldReturn([
            'foo' => $mock
        ]);
    }

    function it_registers_the_default_plugins()
    {
        $this->registerDefaultPlugins();

        $plugins = $this->getPlugins();

        $plugins->shouldBeArray();
        $plugins->shouldHaveCount(3);
        $plugins->shouldHaveKeys(['concat', 'move', 'copy']);
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'haveKeys' => function(array $subject, array $keys)
            {
                foreach ($keys as $key)
                {
                    if ( ! \array_key_exists($key, $subject))
                    {
                        return false;
                    }
                }

                return true;
            },
        ];
    }

}

