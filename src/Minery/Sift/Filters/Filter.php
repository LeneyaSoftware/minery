<?php

namespace Minery\Sift\Filters;

use Minery\Dig\Contracts\ArrayableInterface;
use Minery\Exception\ReportNotPersistableException;

/**
 * Class Filter
 * @package Minery\Sift\Filters
 */
abstract class Filter implements ArrayableInterface
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
     * Filter constructor.
     * @param $field
     * @param $value
     */
    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * @param bool $negate
     * @return mixed
     */
    public abstract function generate($negate = false);

    /**
     * @param $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'class' => get_class($this),
            'field' => $this->field,
            'value' => $this->value
        ];
    }

    /**
     * @param $array
     * @throws ReportNotPersistableException
     */
    public function fromArray($array)
    {
        if (!array_key_exists('field', $array) || !array_key_exists('value', $array)) {
            throw new ReportNotPersistableException('The file you are attempting to load is not formatted correctly');
        }
        $this->field = $array['field'];
        $this->value = $array['value'];
    }
} 