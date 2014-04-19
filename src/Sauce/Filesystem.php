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
     * Remove a file
     *
     * @param string $file
     * @return boolean
     */
    public function remove($file)
    {
        return @unlink($file);
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
     * Read a file
     *
     * @param string $file
     * @return mixed
     */
    public function read($file)
    {
        return \file_get_contents($file);
    }

    /**
     * Rewrite a file (or create + write)
     *
     * @param string $file
     * @param string $content
     * @return integer
     */
    public function rewrite($file, $content)
    {
        return \file_put_contents($file, $content);
    }

    /**
     * Append to a file
     *
     * @param string $file
     * @param string $content
     * @return integer
     */
    public function append($file, $content)
    {
        return \file_put_contents($file, $content, FILE_APPEND);
    }

}

