<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;
use App\MpesaTransaction;


class mpesa extends Controller
{
    public function mpesapassword(){
        $passkey="";
        $shortcode=174379;
        $timestamp=Carbon::parse('now')->format('YmdHms');

        $mpassword=base64_encode($shortcode.$passkey.$timestamp);

        return $mpassword;
    }
//generate new access token
    public function newAccessToken(){
        $consumer_key="";
        $consumer_secret="";
        $credentials=base64_encode($consumer_key.':'.$consumer_secret);
        $url="my url";

        //use curl to make requests

        $curl= curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $curl_response = curl_exec($curl);
        $accessToken=json_decode($curl_response);
        curl_close($curl);

        return $accessToken->access_token;

    }
    //initiate stk push request

    public function stkpush()
    {
        $url="my api";
        $curl_post_data=[
            'shortcode' =>174379,
            'password' =>$this->mpesapassword(),
            'callback' => 'http://localhost:8080'
            //and many more parameters
        ];
        $datastring =json_encode($curl_post_data);

        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json, Authorization:bearer'.$this->newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $datastring);

        if($curl_response=curl_exec($curl))
        {
            return $curl_response;
        }
        else{
            return "failed to iniate stk push";
        }

    }

    // //method to initiate stk push
    // public function confirmation(Request $request){
    //     $response = json_decode($request->getContent(),true);
    //     $trans = new MpesaTransaction;
    //     $trans->newres = json_encode($response,true);
    //     $trans->amount = $response->Amount;
    //     $trans->Phone = $response->phone;
    //     $trans->save();
    // }


}
