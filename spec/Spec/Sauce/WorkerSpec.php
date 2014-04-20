<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorkerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Worker');
    }

    function it_receives_the_input_path()
    {
        $this->in('something')->shouldReturnItself();
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

