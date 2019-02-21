function api_query($method, array $req = array()) {
        // Obtain API keys under settings.
        $publickey = ''; 
        $privatekey = ''; 
 
        $req['method'] = $method;
        $mt = explode(' ', microtime());
        $req['nonce'] = $mt[1];

        // generate the POST data string
        $post_data = http_build_query($req, '', '&');

        $sign = hash_hmac("sha512", $post_data, $privatekey);
 
        // generate the extra headers
        $headers = array(
                'Sign: '.$sign,
                'Key: '.$publickey,
        );
 
        // our curl handle (initialize if required)
        static $ch = null;
        if (is_null($ch)) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; Tux API PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
        }
        curl_setopt($ch, CURLOPT_URL, 'https://tuxexchange.com/api');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 
        // run the query
        $res = curl_exec($ch);

        if ($res === false) throw new Exception('Could not get reply: '.curl_error($ch));
        $dec = json_decode($res, true);
        if (!$dec) throw new Exception('Invalid data received, please make sure connection is working and requested API exists');
        return $dec;
}

// get ticker data 
$result = api_query("getticker");

// Get my withdraw history
$result = api_query("getmywithdrawhistory");

// Get mybalances 
$result = api_query("getmybalances");

// Get mybalances 
$result = api_query("getmyopenorders");

// buy/sell/cancel
$result = api_query("buy", array("coin" => "DOGE" ,"market" => "BTC", "amount" => "1", "price" => "0.00000038"));

$result = api_query("sell", array("coin" => "DOGE" ,"market" => "BTC", "amount" => "1", "price" => "0.00000038"));

// cancelorder
$result = api_query("cancelorder", array("id" => "1234123", "market" => "BTC"));

// Request a withdraw.
$result = api_query("withdraw", array("coin" => "DOGE","address" => "DM2DasYjU1RWePFSLHFJqFMBtHSWbKmHpR", "amount" => "300"));
