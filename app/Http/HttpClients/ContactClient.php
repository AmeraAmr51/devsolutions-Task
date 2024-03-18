<?php

namespace App\Http\HttpClients;

use App\Models\ContactConfig;


class ContactClient{

    public $baseUrl  = '';
    public $httpClient;

    function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
        $this->baseUrl = config('contact.mode') == 'live' ? config('contact.live_urls') : config('contact.test_urls');
    }


    public function sendRequest($type,$action, $body = [],$id=null){

            $url = $this->baseUrl[$action];
            if(isset($id)) $url = $url . '/' . $id;
            $response = $this->httpClient->request($type, $url, [
                \GuzzleHttp\RequestOptions::JSON => $body,
                'timeout' => 30,
                'headers' =>
                [
                    'Authorization' => 'Bearer ' . $this->getToken(),
                    'Accept' => 'application/json',
                ],
                ]
            );

            $data = json_decode($response->getBody(),true);

           return $data;
        }

    protected  function getToken(){
      return ContactConfig::where(['userName'=>config('contact.username'),'password'=>config('contact.password')])->first()->token;
    }

}