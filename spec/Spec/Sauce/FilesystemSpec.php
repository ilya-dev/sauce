<?php namespace Spec\Sauce;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilesystemSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sauce\Filesystem');
    }

    function it_detects_a_directory()
    {
        $this->isDirectory(\uniqid())->shouldBe(false);

        $this->isDirectory(__DIR__)->shouldBe(true);
    }

}

