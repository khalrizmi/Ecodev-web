<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(Request $req)
    {
    	$this->sendNotif($req->title,$req->content);
    	return back()->withMessage('Pesan siaran telah dikirim!');
    }

    public function sendNotif($title,$message)
    {
        define( 'API_ACCESS_KEY', 'AAAAg2o_cmk:APA91bGbdw-4izaqsIX6k8aN0GROtaPuLypdjXcjh8Bb7LHKJEtgIDr2uS3GF8UJr332GEjRPaS1D_Lxh6mEq7jTj8y9tvQi4t9hzMGuFexsM053CyM8ObsKhcntnQlyk9KU8FRKbUFG');

            $fields = [
                'to'    => "/topics/all",
                'data'  => [
                    'message'   => $message,
                    'title'     => $title,
                ]
            ];
            
            
            $headers = [
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            ];
                
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
    }
}
