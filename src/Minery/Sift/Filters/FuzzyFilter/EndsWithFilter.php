<?php

namespace Minery\Sift\Filters\Fuzzy;

use Minery\Sift\Contracts\iFilter;

/**
 * Class EndsWithFilter
 * @package Minery\Sift\Filters\Fuzzy
 */
class EndsWithFilter extends Filter
{
    /**
     * @param bool $negate
     * @return string
     */
    public function generate($negate = false)
    {
        if ($negate) {
            return " {$this->field} NOT LIKE '%{$this->value}' ";
        }

        return " {$this->field} LIKE '%{$this->value}' ";
    }
} 