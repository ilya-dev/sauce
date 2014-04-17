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

    /**
     * Determine whether the given path points to a file
     *
     * @param string $path
     * @return bool
     */
    public function isFile($path)
    {
        return \is_file($path);
    }

    /**
     * Get all files placed in the given directory.
     * The output will be like ['foo.txt', 'bar.jpg', ...]
     *
     * @param string $directory
     * @return array
     */
    public function getAllFiles($directory)
    {
        $files = [];

        $this->finder->in($directory)->files();

        foreach ($this->finder as $file)
        {
            $files[] = $file->getFilename();
        }

        return $files;
    }

    /**
     * "Combine" two elements (file/directory)
     *
     * @param array $from
     * @param array|string $to
     * @return array
     */
    public function combine(array $from, $to)
    {
        if (\is_string($to))
        {
            $to = \array_fill(0, \count($from), $to);
        }
        elseif ( ! \is_array($to))
        {
            $message = "The second argument must be either a string or an array";

            throw new \InvalidArgumentException($message);
        }

        if (\count($from) != \count($to))
        {
            $message = "Arguments have a different amount of elements";

            throw new \LogicException($message);
        }

        $iterator = function($from, $to)
        {
            return [$from, $to];
        };

        return \array_map($iterator, $from, $to);
    }

}

