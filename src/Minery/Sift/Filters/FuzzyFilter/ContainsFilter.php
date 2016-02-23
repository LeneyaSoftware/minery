<?php

namespace Minery\Sift\Filters\Fuzzy;

/**
 * Class ContainsFilter
 * @package Minery\Sift\Filters\Fuzzy
 */
class ContainsFilter extends Filter
{
    /**
     * @param bool $negate
     * @return string
     */
    public function generate($negate = false)
    {
        if ($negate) {
            return " {$this->field} NOT LIKE '%{$this->value}%' ";
        }

        return " {$this->field} LIKE '%{$this->value}%' ";
    }
} 