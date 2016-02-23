<?php

namespace Minery\Sift\Filters\Equals;

use Minery\Sift\Filters\Filter;

/**
 * Class TextFilter
 * @package Minery\Sift\Filters\Equals
 */
class TextFilter extends Filter
{

    /**
     * @var
     */
    protected $field;
    /**
     * @var
     */
    protected $value;

    /**
     * @param bool $negate
     * @return string
     */
    public function generate($negate = false)
    {
        if ($negate) {
            return "{$this->field} NOT LIKE {$this->value}";
        }

        return "{$this->field} LIKE {$this->value}";
    }

} 