<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClosureReflectionSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(function($bar = null)
        {
            return $this->foo.$bar;
        });
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\ClosureReflection');
    }

    function it_invokes_a_closure_with_the_given_context()
    {
        $context = (object) ['foo' => 'Hello, world!'];

        $this->withContext($context)->shouldReturn('Hello, world!');

        $this->withContext($context, [' Dummy'])->shouldReturn('Hello, world! Dummy');
    }

    function it_returns_an_array_of_ReflectionParameter_instances()
    {
        $parameters = $this->getParameters();

        $parameters->shouldBeArray();
        $parameters->shouldHaveCount(1);
        $parameters->shouldAllHaveType('ReflectionParameter');
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'allHaveType' => function(array $subject, $type)
            {
                $iterator = function($element) use($type)
                {
                    return ($element instanceof $type);
                };

                return \count(\array_map($iterator, $subject)) == \count($subject);
            },
        ];
    }

}

