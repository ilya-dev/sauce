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

    function it_detects_a_file()
    {
        $this->isFile(\uniqid())->shouldBe(false);

        $this->isFile(__FILE__)->shouldBe(true);
    }

    function it_scans_a_directory()
    {
        $files = $this->getAllFiles(__DIR__);

        $files->shouldBeArray();
        $files->shouldContain(\basename(__FILE__));
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'contain' => function(array $subject, $value)
            {
                return \in_array($value, $subject, true);
            },
        ];
    }

}

