<?php

namespace App\Services\Subscription;

use App\Entities\Subscription;
use App\Entities\ScheduledOrder;

class GetScheduledOrders
{
    /**
     * Handle generating the array of scheduled orders for the given number of weeks and subscription.
     *
     * @param \App\Entities\Subscription $subscription
     * @param int                        $forNumberOfWeeks
     *
     * @return array
     */
    public function handle(Subscription $subscription, $forNumberOfWeeks = 6)
    {
        //
        $plan = $subscription->getPlan();
        $status = $subscription->getStatus();
        $nextDeliveryDate = $subscription->getNextDeliveryDate();
        
        $shouldBeInterval = true;
        $subscriptionArr = [];
        if($status =='Active'){
            if($plan == 'Weekly'){
                for ($i = 0; $i < $forNumberOfWeeks; $i++) {
                    $order = new ScheduledOrder($nextDeliveryDate,$shouldBeInterval);
                    $subscriptionArr[] = $order;
                    $nextDeliveryDate->addWeek();
                } 
            }else{
                for ($i = 0; $i < $forNumberOfWeeks; $i++) {
                    $order = new ScheduledOrder($nextDeliveryDate,$shouldBeInterval);
                    $subscriptionArr[] = $order;
                    $nextDeliveryDate->addWeek();
                    $shouldBeInterval = !$shouldBeInterval;
                } 
            }
        }
        return $subscriptionArr;
    }
}