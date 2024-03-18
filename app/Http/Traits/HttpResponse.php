<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Response;
trait HttpResponse {

        public function errorResponse($errors = [], $message = 'Something Worng' ,$status_code=400)
        {
            $response = [
                'status_code' => $status_code,
                'success' => false,
                'message' => $message,
                'errors' => $errors
            ];
            return Response::json($response);
        }

        public function successResponse($data = null, $message = 'Success',$status_code=200)
        {
            $response = [
                'status_code' => $status_code,
                'success' => true,
                'message' => $message,
                'data' => $data,
            ];

            return Response::json($response);
        }

    }