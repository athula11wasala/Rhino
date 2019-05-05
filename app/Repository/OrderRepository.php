<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Order;

class OrderRepository {

    public function userAdd($orderArr) {

        try {
            $this->deleteOrder();
            \DB::beginTransaction();
            foreach ($orderArr as $data) {
                $friend_str = '';
                $objOrder = new Order;
                $objOrder->day = $data['day'];
                $objOrder->amount = $data['amount'];
                $objOrder->paid_by = $data['paid_by'];
                foreach ($data['friends'] as $rows) {

                    $friend_str .= $rows;
                    if (isset($friend_str)) {
                        $friend_str .=",";
                    }
                }
                $objOrder->friends = $friend_str;
                $objOrder->save();
                \DB::commit();
            }
            return true;
        } catch (Exception $ex) {
            \DB::rollBack();
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            \DB::rollBack();

            exit($ex->getMessage());
        }
    }

    public function deleteOrder() {

        $orderObj = Order::truncate();

        return $orderObj;
    }

    public function allOrderInfo($paidBy='', $paidDate='') {

        $order = Order::select("*");
        if(!empty($paidBy))
        {
            $order = $order->where("paid_by",$paidBy);
        }
         if(!empty($paidDate))
        {
            $order = $order->where("day",$paidDate);
        }
        $order = $order->get();
  
        return $order;
    }


    public function getPaidByInfo() {

        $objOrder = Order::groupBy('paid_by')->select('paid_by')->get();
        $retArray[0] = "Please Order By";
        foreach ($objOrder as $rows) {
            $retArray[$rows->paid_by] = $rows->paid_by;
        }

        return $retArray;
    }

    public function getOrderBydayInfo() {

        $objOrder = Order::groupBy('day')->select('day')->get();
        $retArray[0] = "Please Select Date";
        foreach ($objOrder as $rows) {
            $retArray[$rows->day] = $rows->day;
        }
        return $retArray;
    }

}
