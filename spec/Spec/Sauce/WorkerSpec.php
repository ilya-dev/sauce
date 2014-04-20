<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sauce\Plugins\Plugin;

class WorkerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Worker');
    }

    function it_receives_the_input_path()
    {
        $this->in('something')->shouldReturnItself();
    }

    function it_receives_a_plugin(Plugin $plugin)
    {
        $this->pipe($plugin)->shouldReturnItself();
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'returnItself' => function($subject)
            {
                return ($subject instanceof \Sauce\Worker);
            },
        ];
    }

}

