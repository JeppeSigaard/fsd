<?php 

class MailChimp
{
    private $api_key;
    private $api_endpoint = 'https://<dc>.api.mailchimp.com/2.0';
    private $verify_ssl   = false;
    /**
     * Create a new instance
     * @param string $api_key Your MailChimp API key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        list(, $datacentre) = explode('-', $this->api_key);
        $this->api_endpoint = str_replace('<dc>', $datacentre, $this->api_endpoint);
    }
	
	/**
     * Validates MailChimp API Key
     */
    public function validateApiKey()
    {
        $request = $this->call('helper/ping');
		return !empty($request);
    }
    /**
     * Call an API method. Every request needs the API key, so that is added automatically -- you don't need to pass it in.
     * @param  string $method The API method to call, e.g. 'lists/list'
     * @param  array  $args   An array of arguments to pass to the method. Will be json-encoded for you.
     * @return array          Associative array of json decoded API response.
     */
    public function call($method, $args = array(), $timeout = 10)
    {
        return $this->makeRequest($method, $args, $timeout);
    }
    /**
     * Performs the underlying HTTP request. Not very exciting
     * @param  string $method The API method to be called
     * @param  array  $args   Assoc array of parameters to be passed
     * @return array          Assoc array of decoded result
     */
    private function makeRequest($method, $args = array(), $timeout = 10)
    {
        $args['apikey'] = $this->api_key;
        $url = $this->api_endpoint.'/'.$method.'.json';
        $json_data = json_encode($args);
        if (function_exists('curl_init') && function_exists('curl_setopt')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $result    = file_get_contents($url, null, stream_context_create(array(
                'http' => array(
                    'protocol_version' => 1.1,
                    'user_agent'       => 'PHP-MCAPI/2.0',
                    'method'           => 'POST',
                    'header'           => "Content-type: application/json\r\n".
                                          "Connection: close\r\n" .
                                          "Content-length: " . strlen($json_data) . "\r\n",
                    'content'          => $json_data,
                ),
            )));
        }
        return $result ? json_decode($result, true) : false;
    }
}


add_action('wp_ajax_smamo_newsletter','smamo_ajax_newsletter');
add_action('wp_ajax_nopriv_smamo_newsletter','smamo_ajax_newsletter');
function smamo_ajax_newsletter(){
    
    
    
    $response = array();
    
    $email = wp_strip_all_tags($_POST['email']);
    $name = wp_strip_all_tags($_POST['name']);
    $company = wp_strip_all_tags($_POST['company']);
    
    
    if(!$email || $email === ''){
        $response['error'] = 'Indtast venligst en email';
        echo json_encode($response);
        exit;
    }
    
    if(!$name || $name === ''){
        $response['error'] = 'Indtast venligst et navn';
        echo json_encode($response);
        exit;
    }
    
    $MailChimp = new MailChimp('ba0b66dc16c9b1243fb3b398438407e7-us11');
    $result = $MailChimp->call('lists/subscribe', array(
        'id'                => 'f53e3e341b',
        'email'             => array('email'=>$email),
        'merge_vars'        => array('NAME'=>$name, 'COMPANY'=>$company),
        'double_optin'      => true,
        'update_existing'   => true,
        'replace_interests' => false,
        'send_welcome'      => true,
    ));
    
    $response['mailchimp'] = $result;
    
    
    $response['success'] = '<h3>Tjek din indbakke</h3><p>Tak for din tilmelding. Du vil modtage en endelig bekræftelsesmail på den indtastede e-mailadresse.</p>';
    echo json_encode($response);
    exit;
}