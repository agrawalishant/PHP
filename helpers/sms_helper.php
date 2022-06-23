<?php

if (!function_exists('send_sms_new')) 
    {
    	function send_sms_new($contact, $msg) 
        {
    		$data='<?xml version="1.0" encoding="UTF-8"?>
            <xmlapi>
                <auth>
                <apikey>Aa7562f930f4fc5fa2ce7100af2895744</apikey>      
                </auth>
                <sendSMS>
                <to>'.$contact.'</to>
                <text>'.$msg.'</text>
                <sender>PNPINF</sender>
                </sendSMS>
                <response>Y</response>
                <unicode>N</unicode>
            </xmlapi>';

            $url = "http://map-alerts.smsalerts.biz/api/xmlapi.php?data=" .urlencode($data);
           // $url = "https://sms.pnpuniverse.com/api/xmlapi.php?data="                   .urlencode($data);
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output=curl_exec($ch);
            return  $output;

            print_r($output);
            curl_close($ch);
        }
    }  

if (!function_exists('calling')) 
    {
        function calling($data_string)
        {   
          
            
            
              $response=json_decode($data_string);
            //  print_r($response); 
              $agent =$response->agent;
              $customer =$response->customer;
              $seconds =$response->seconds;
       
            $url = "http://testpnp.ml/test/index1.php?agent=".$agent."&customer=".$customer."&seconds=".$seconds;
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output=curl_exec($ch);
        curl_close($ch);
        $response=json_decode($output);
         
        /*    $authkey="lmCh3RmvBfyNS2dm1PjkjdHtPvTncZKoiwWqC0p0nU8Se9KQNCnUzPwdSaNuGpjDf96ZExjIa7unMyVMNwPSjpHVhdWOvqrhsYSXgzRJnFuXmspJmIgyteck";

            $result = file_get_contents('https://airson.co.in/secureapi/api/client/connect-customer-with-agent', null, stream_context_create(array(
            'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json' . "\r\n"
            . 'Content-Length: ' . strlen($data_string) . "\r\n"
            . 'Authorization: '.$authkey. "\r\n",
            'content' => $data_string,
            ),
            ))); 
            return $result; */

        }
    }
?>