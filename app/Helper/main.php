<?php


    function api_res($data = [], $code = 200, $message = '', $status = true){
        $message_arr = [
            200 => 'All is good!',
            201 => 'Create',
        ];

        if($status && $code == 200 && empty($message)) {

            return \response([
                'status' => true,
                'message' => '',
                'data' => $data
            ],$code, [ 'content-type'=> 'application/json' ] );

        } else {
            return \response([
                'status' => $status,
                'message' => (empty($message) ? ($message_arr[$code] ?? '') : $message),
                'data' => $data
            ],$code, [ 'content-type'=> 'application/json' ] );

        }
    }
