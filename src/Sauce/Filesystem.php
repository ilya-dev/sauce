<?php namespace Sauce;

use Symfony\Component\Finder\Finder;

class Filesystem {

    /**
     * The Finder instance
     *
     * @var \Symfony\Component\Finder\Finder
     */
    protected $finder;

    /**
     * The constructor
     *
     * @param \Symfony\Component\Finder\Finder|null $finder
     * @return Filesystem
     */
    public function __construct(Finder $finder = null)
    {
        $this->finder = $finder ?: new Finder;
    }

    /**
     * Determine whether the given path points to a directory
     *
     * @param string $path
     * @return bool
     */
    public function isDirectory($path)
    {
        return \is_dir($path);
    }

}

