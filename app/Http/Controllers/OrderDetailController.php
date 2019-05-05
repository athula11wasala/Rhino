<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Order;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Traits\PaymentValidators;
use App\Services\CmsService;

class OrderDetailController extends Controller {

    private $cmsService;

    use PaymentValidators;

    public function __construct(CmsService $cmsService) {

        $this->cmsService = $cmsService;
    }

    /**
     * create order
     * @param Request $request
     * @return type
     */
    public function addOrder(\Illuminate\Http\Request $request) {

        if ($request->method() == "POST") {

            $validator = $validator = $this->PaymentValidate(Input::all());

            if ($validator->passes()) {

                $orders = $this->cmsService->addOrders(Input::get('data'));

                if ($orders) {
                    return response()->json('Successfully added', 200);
                }

                return response()->json('Error occured', 400);
            } else {

                return response()->json($validator->errors(), 422);
            }
        }
    }

    /**
     * get order details
     * @param Request $request
     * @return type
     */
    public function viewOrder(Request $request) {

        $objPaidByList = $this->cmsService->getOrderByPaidUser();
        $objDateList = $this->cmsService->getOrderByDay();
        $paidBy = !empty(Input::get('selPaidBy')) ? Input::get('selPaidBy') : '';
        $paidDate = !empty(Input::get('selOrderDate')) ? Input::get('selOrderDate') : '';
        $objOrderList = $this->cmsService->getOrders($paidBy, $paidDate);

        return view('order_list', ['data' => $objOrderList, 'objPaidByList' => $objPaidByList, 'objOrderDate' => $objDateList]);
    }

}
