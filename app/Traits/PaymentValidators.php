<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait PaymentValidators {

    protected function rule($method, $data) {

        switch ($method) {
            case 'GET':

            case 'POST': {
                    return [
                        'data' => 'required',
                    ];
                }
            case 'ChkDataElementDetail': {

                    return [
                        '*.day' => "required",
                        '*.amount' => "required",
                        '*.friends' => "required",
                        '*.paid_by' => "required",
                    ];
                }


            case 'PUT': {
                    
                }

            default:
                break;
        }
    }

    protected function PaymentValidate(array $data, $method = "POST") {

        $messages = [

            'data.required' => 'Please add Data Element',
            '*.day.required' => 'Please add Day Element',
            '*.amount.required' => 'Please add amount Element',
            '*.friends.required' => 'Please add Friends Element',
            '*.paid_by.required' => 'Please add Paid By Element',
        ];
        if ($method == "POST") {

            $validator = Validator::make($data, $this->rule($method, $data), $messages);
            if ($validator->fails()) {


                return $validator;
            } else {

                return Validator::make($data['data'], $this->rule('ChkDataElementDetail', $data['data']), $messages);
            }
        }
    }

}
