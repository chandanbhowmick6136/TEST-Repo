<?php

namespace App\Entities;

use Carbon\Carbon;

class ScheduledOrder
{
    /**
     * The delivery date of this scheduled order.
     *
     * @var \Carbon\Carbon
     */
    protected $deliveryDate;

    /**
     * Is this delivery marked as a holiday that will be skipped.
     *
     * @var bool
     */
    protected $holiday = false;

    /**
     * Is this scheduled order an opt in order that is not part of the normal subscription's plan cycle.
     *
     * @var bool
     */
    protected $optIn = false;

    /**
     * Is this scheduled order part of the subscriptions normal plan cycle.
     *
     * @var bool
     */
    protected $interval = true;

    /**
     * ScheduledOrder constructor.
     *
     * @param \Carbon\Carbon     $deliveryDate
     * @param \App\Entities\bool $isInterval
     */
    public function __construct(Carbon $deliveryDate, bool $isInterval)
    {
        $this->deliveryDate = $deliveryDate;
        $this->interval     = $isInterval;
    }

    /**
     * return current interval state
     */
    public function isInterval(){
        return $this->interval;
    }

    /**
     * Set holiday Status
     */
    public function setHoliday(bool $isHoliday){
        $this->holiday = $isHoliday;
    }

     /**
     * return current holiday state when interval is true else return interval state
     */
    public function isHoliday(){
        return $this->holiday && $this->interval;
    }

    /**
     * Return delivery Date
     */
    public function getDeliveryDate(){
        return $this->deliveryDate;
    }

    /**
     * Set Opt Status
     */
    public function setOptIn(bool $isOptIn){
        $this->optIn = $isOptIn;
    }

     /**
     * return current Opt state when interval is false
     */
    public function isOptIn(){
        return $this->interval ? false : $this->optIn;
    }

}