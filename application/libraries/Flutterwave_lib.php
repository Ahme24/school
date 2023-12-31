<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Flutter Wave Library for CodeIgniter 3.X.X
 *
 * Library for Flutter Wave payment gateway. It helps to integrate Flutter Wave payment gateway's Standard Method
 * in the CodeIgniter application.
 *
 * It requires Flutterwave configuration file and it should be placed in the config directory.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      Jaydeep Goswami
 * @link        https://infinitietech.com
 * @GITHUB link https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library
 * @license     https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/LICENSE
 * @version     1.0
 */

class Flutterwave_lib{
    var $payment_url,$verify_url;
    var $PBFPubKey, $SECKEY, $txn_prefix;
    protected $currency = 'NGN';
    var $post_data = array();
    var $CI;
    
    function __construct(){
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('form');
        
        $dbflutterwave = json_decode($this->CI->db->get_where('payment_gateways', array('name' => 'flutterwave'))->row()->settings);
        
        if($dbflutterwave->test_mode == 1){
            $this->payment_url = 'https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/hosted/pay';
            $this->verify_url  = 'https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify';
            $this->PBFPubKey   = $dbflutterwave->test_public_key;
            $this->SECKEY      = $dbflutterwave->test_secret_key;
            $this->currency    = $dbflutterwave->currency;
            $this->txn_prefix  = 'TXN';   
        }else{
            $this->payment_url = 'https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay';
            $this->verify_url  = 'https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify';
            $this->PBFPubKey   = $dbflutterwave->live_public_key;
            $this->SECKEY      = $dbflutterwave->live_secret_key;
            $this->currency    = $dbflutterwave->currency;
            $this->txn_prefix  = 'TXN';   
        }
    }
    
    function create_payment($data){
        $data['PBFPubKey'] = $this->PBFPubKey;
        $data['currency'] = $this->currency;
        $data['txref'] = (!empty($this->txn_prefix))?$this->txn_prefix.'-'.time().''.mt_rand() : time().''.mt_rand();
        $response = $this->curl_post($this->payment_url, $data,TRUE);
        return $response;
    }
    
    function verify_transaction($reference){
        $data = array(
			"SECKEY" => $this->SECKEY, 
			"txref" => $reference
		);
		$response = $this->curl_post($this->verify_url, $data,TRUE);
        return $response;
    }
    
    function curl_post($url, $data,$json_encode_data = FALSE)
    {
        $data = ($json_encode_data)?json_encode($data):$data;
        $curl = curl_init();
        curl_setopt_array($curl, array(
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $data,
    		CURLOPT_HTTPHEADER => [
    			"content-type: application/json",
    			"cache-control: no-cache"
    		],
    	));
    	$response = curl_exec($curl);
    	if($err = curl_error($curl)){
    	    curl_close($curl);
    	    return "CURL Error : ".$err;
    	}else{
        	curl_close($curl);
        	return $response;
        }
    }
}
