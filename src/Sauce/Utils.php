<?php namespace Sauce;

class Utils {

    /**
     * "Combine" two elements (file/directory)
     *
     * @param array $from
     * @param array|string $to
     * @throws \LogicException
     * @throws \InvalidArgumentException
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

