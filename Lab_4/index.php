<?php
interface DeliveryStrategy {
     public function calculateCost($distance, $weight);
}

class PickupDeliveryStrategy implements DeliveryStrategy {
    public function calculateCost($distance, $weight) {

    }
}

class ExternalDeliveryStrategy implements DeliveryStrategy {
    public function calculateCost($distance, $weight) {

    }
}
class OwnDeliveryStrategy implements DeliveryStrategy {
    public function calculateCost($distance, $weight) {

    }
}

class OrderProcessor {
    private $deliveryStrategy;
    
    public function setDeliveryStrategy(DeliveryStrategy $deliveryStrategy) {
        $this->deliveryStrategy = $deliveryStrategy;
    }
    
    public function calculateDeliveryCost($distance, $weight) {
        return $this->deliveryStrategy->calculateCost($distance, $weight);
    }
}