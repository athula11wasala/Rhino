<?php

namespace App\Services;

use App\Repository\OrderRepository;
use DB;
use Illuminate\Support\Facades\Config;

class CmsService {

    private $ordrRepository;

    /**
     * @param OrderRepository $ordrRepository
     */
    public function __construct(OrderRepository $ordrRepository) {

        $this->ordrRepository = $ordrRepository;
    }
     
    public function addOrders($data) {
        return $this->ordrRepository->userAdd($data);
    }
    
     public function getOrders($paidBy,$paidDate) {
        return $this->ordrRepository->allOrderInfo($paidBy,$paidDate);
    }
    
    public function getOrderByPaidUser() {
        return $this->ordrRepository->getPaidByInfo();
    }
    
     public function getOrderByDay() {
        return $this->ordrRepository->getOrderBydayInfo();
    }
    
    public function getOrdersByDate($data) {
        return $this->ordrRepository->userAdd($data);
    }

    public function getOrdersByUser($data) {
        return $this->ordrRepository->userAdd($data);
    }
    

}
