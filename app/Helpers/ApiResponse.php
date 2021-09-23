<?php 
function apiResponseBuilder($code,$data)
{
        if ($code==200) {
            $response['status'] = 200;
            $response['data'] = $data;
        }else if ($code==400){
            $response['status'] = 400;
            $response['data'] = $data;        
        }else if ($code==404){
            $response['status'] = 404;
            $response['data'] = $data;
        }else if ($code==401){
            $response['status'] = 401;
            $response['data'] = $data;
        }else if ($code==405){
            $response['status'] = 405;
            $response['data'] = $data;
        } else {
            $response['status'] = 500;
            $response['data'] = $data;
        }

        return response()->json($response,$code);
}

    function apiResponseValidationFails($message = null, $errors = null, $status_code = 422) {
    return response()->json([
        'message' => $message,
        'status_code' => $status_code,
        'data' => [
            'errors' => $errors
        ]
    ], $status_code);
}

/**
 * api response success
 *
 * @param null $message
 * @param null $data
 * @param int $status_code
 * @return \Illuminate\Http\JsonResponse
 */
function apiResponseSuccess($message = null, $data = null, $status_code = 200) {
    return response()->json([
        'message' => $message,
        'status_code' => $status_code,
        'data' => $data
    ], $status_code);
}

/**
 * api response errors
 *
 * @param null $message
 * @param null $data
 * @param int $status_code
 * @return \Illuminate\Http\JsonResponse
 */
function apiResponseErrors($message = null, $data = null, $status_code = 401) {
    return response()->json([
        'message' => $message,
        'status_code' => $status_code,
        'data' => $data
    ], $status_code);
}