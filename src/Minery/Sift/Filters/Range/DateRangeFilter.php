<?php

namespace Minery\Sift\Filters\Range;
use Minery\Exception\InvalidTypeException;

/**
 * Class DateRangeFilter
 *
 * Creates a date range filter.
 *
 * @package Minery\Sift\Filters\Range
 * @author Josh Walker - josh.walker@leneya.com
 * @version 6.1.15
 */
class DateRangeFilter extends RangeFilter{

    public function __construct($field,$lower,$upper){
        $this->lower = $this->toDate($lower,'lower');
        $this->upper = $this->toDate($upper,'upper');
        $this->field = $field;
    }

    /**
     * Converts a date string into a DateTime object so we can reliably create our date filter.
     *
     * @param $value
     * @param $boundType - upper or lower bound?
     * @return \DateTime
     * @throws \Minery\Exception\InvalidTypeException
     */
    protected function toDate($value,$boundType){
            //try to get the DateTime object from a timestamp or regular date format.
            try{
                if($this->isTimestamp($value))
                    $dateTime = new \DateTime('@'.$value);
                else
                    $dateTime = new \DateTime($value);

                //if upper bound, add one day so that we make sure we get all of the stuff from the upper bound day.
                //days by default will return MIDNIGHT OF THE UPPER bound, which means that the filter will only get
                //items between lower (midnight) and upper (midnight). However, I think we want lower(midnight) to
                //upper (fullday)
                if($boundType == 'upper')
                    $dateTime->add(new \DateInterval('1 day'));

                return $dateTime->format('Y\m\d H:i:s');
            }
            catch(\Exception $e){
                throw new InvalidTypeException('Invalid Date or Timestamp passed in: '.$value);
            }
    }

    /**
     * Checks if the value passed in for a date is a timestamp.
     * @param $value
     * @return bool
     */
    protected function isTimestamp($value){
        return ((string) (int) $value === $value)
        && ($value <= PHP_INT_MAX)
        && ($value >= ~PHP_INT_MAX);
    }
} 