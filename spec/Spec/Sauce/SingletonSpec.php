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
        $this->shouldBePersistedAndEqualTo(\Sauce\Singleton::getInstance());
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'bePersistedAndEqualTo' => function($subject, $object)
            {
                return ($object) == $subject;
            },
        ];
    }

}

namespace Sauce;

class Singleton {

    use SingletonTrait;

}

