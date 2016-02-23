<?php

namespace Minery\Sift\Filters\Equals;

use Minery\Exception\InvalidTypeException;
use Minery\Sift\Filters\Filter;

/**
 * Class NumberFilter
 * @package Minery\Sift\Filters\Equals
 */
class NumberFilter extends Filter
{

    /**
     * @param bool $negate
     * @return string
     * @throws InvalidTypeException
     */
    public function generate($negate = false)
    {
        if (!is_numeric($this->value)) {
            throw new InvalidTypeException(
                'Arguments passed into the NumberFilter must be numbers. Passed in: ' . $this->value
            );
        }

        if ($negate) {
            return "{$this->field} != {$this->value}";
        }

        return "{$this->field} = {$this->value}";
    }
} 