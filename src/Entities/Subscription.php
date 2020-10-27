<?php

namespace App\Entities;
use Carbon\Carbon;

class Subscription
{
    /**
     * The statuses a subscription can have.
     *
     * @var int
     */
    const STATUS_ACTIVE    = 1;
    const STATUS_CANCELLED = 2;

    /**
     * The allowed statuses.
     *
     * @var array
     */
    const STATUSES_ALLOWED = [
        self::STATUS_ACTIVE    => 'Active',
        self::STATUS_CANCELLED => 'Cancelled',
    ];

    /**
     * The plans a subscription can have.
     *
     * @var int
     */
    const PLAN_WEEKLY      = 1;
    const PLAN_FORTNIGHTLY = 2;

    /**
     * The allowed plans.
     *
     * @var array
     */
    const PLANS_ALLOWED = [
        self::PLAN_WEEKLY      => 'Weekly',
        self::PLAN_FORTNIGHTLY => 'Fortnightly',
    ];

    /**
     * The subscription status.
     *
     * @var int
     */
    protected $status;

    /**
     * The subscription plan.
     *
     * @var int
     */
    protected $plan;

    /**
     * The next delivery date for this subscription.
     *
     * @var \Carbon\Carbon|null
     */
    protected $nextDeliveryDate;

    public function setStatus(int $state_val){
        $this->status =  $state_val;
    }

    
    public function getStatus(){
        return self::STATUSES_ALLOWED[$this->status];
    }

    
    public function setPlan(int $state_val){
        $this->plan =  $state_val;
    }

    
    public function getPlan(){
        return self::PLANS_ALLOWED[$this->plan];
    }

    
    public function setNextDeliveryDate(Carbon $state_val){
        $this->nextDeliveryDate =  $state_val;
    }

    
    public function getNextDeliveryDate(){
        return $this->nextDeliveryDate;
    }

}