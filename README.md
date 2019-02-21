# Tux Exchange Official API Documentation

[Tux Exchange](https://www.tuxexchange.com) provides access to the API via HTTP POST wth JSON formated data repsonses.

If an error event is received, it will be returned in the following format
```
{"error":{"error message"}}
```
We reserve the right to block API calls from users who we believe are making API calls with the intention of trying to disrupt the operation of the exchange.

## Access methods
- Public (Pull) Public API Methods using HTTP POST
- Authenticated Authenticated API Methods

## Method index:
- getticker Get current ticket data
- get24hvolume Get 24 hour volume
- getorders Get open orders
- gettradehistory Get trade history
- getcoins Get coins listed.
- getmybalances Get my balances
- withdraw Withdraw coins
- getmyaddresses Get deposit addresses
- getmytradehistory Get you trade history
- buy Place a buy order
- sell Place a sell order
- getmyopenorders Get my open orders
- cancelorder Cancel an open order

# Public API

Requests should be sent to https://tuxexchange.com.

[View online](https://www.tuxexchange.com/api?method=getticker)
Generic unauthenticated HTTP POST request example using CURL:
```
curl --data "method=getticker" https://tuxexchange.com/api
```
getticker

method: getticker

Inputs: None
Return data:

coin                    code of the coin being traded.
type                    type of order (Options: buy/sell)
amount                  amount of desired coin to trade
price                   price to place trade

curl example:
```
curl --data "method=getticker" https://tuxexchange.com/api
```
Example Output:
```
{"BTC_LTC":{"id":"2","last":"0.0068","lowestAsk":0,"highestBid":0,"percentChange":"6.249999999999989","quoteVolume":"0.5550265","isFrozen":0,"baseVolume":0,"high24hr":"0.0068","low24hr":"0.0064"},"BTC_DOGE":{"id":"4","last":"0.00000037","lowestAsk":0,"highestBid":0,"percentChange":"-5.128205128205133","quoteVolume":"64799.10656484","isFrozen":0,"baseVolume":0,"high24hr":"0.0000005","low24hr":"0.00000035"},"BTC_DASH":{"id":"12","last":"0.02277001","lowestAsk":0,"highestBid":0,"percentChange":"0","quoteVolume":"0.00439175","isFrozen":0,"baseVolume":0,"high24hr":"0.02277001","low24hr":"0.02277001"},"BTC_PPC":{"id":"13","last":"0.00061234","lowestAsk":0,"highestBid":0,"percentChange":"2.056666666666668","quoteVolume":"0.23616667","isFrozen":0,"baseVolume":0,"high24hr":"0.00061234","low24hr":"0.0006"}}
```
get24hvolume
View Online

method: get24hvolume

Inputs: Optional: Coin
Return Data:

coin                    code of the coin being traded.
type                    type of order (Options: buy/sell)
amount                  amount of desired coin to trade
price                   price to place trade

curl example:

curl -X POST --data '{"method":"get24hvolume"}'

Example Output:

{"BTC_LTC":{"LTC":"8.586698120000001","BTC":"0.05676944"},"BTC_DOGE":{"DOGE":"216668.96635828","BTC":"0.08666463"},"BTC_DASH":{"DASH":"2.73467494","BTC":"0.06012284"},"BTC_PPC":{"PPC":"6.65389937","BTC":"0.00424749"}}

getorders
View Online

method: getorders

Inputs: coin

coin                    code of the coin being traded.
type                    type of order (Options: buy/sell)
amount                  amount of desired coin to trade
price                   price to place trade

Example Output:

{"asks":[["85.00000000","130.00000000"],["80.00000000","400.00000000"],["44.00000000","1958.00000000"],["42.00000000","500.00000000"],["12.00000000","10.00000000"],["0.03933300","1980.00000000"],["0.00000400","501.00000000"],["0.00000097","487.26800000"],["0.00000088","438.85292682"],["0.00000060","169.13000000"],["0.00000059","169.49152550"],["0.00000058","172.41379320"],["0.00000057","175.43859650"],["0.00000056","178.57142860"],["0.00000055","181.81818190"],["0.00000054","185.18518520"],["0.00000053","476.80924529"],["0.00000052","192.30769240"],["0.00000051","196.07843138"],["0.00000050","548.56581345"],["0.00000049","500.00000000"],["0.00000048","8353.64494905"],["0.00000047","500.00000000"],["0.00000046","946.00000000"],["0.00000045","505112.76764157"],["0.00000044","1000.00000000"],["0.00000043","4112.95383493"],["0.00000042","8234.65663205"],["0.00000041","18313.60257500"],["0.00000040","2000.00000000"]],"bids":[["0.00000014","1580.00000000"],["0.00000017","1433.00000000"],["0.00000018","972.00000000"],["0.00000020","500.00000000"],["0.00000021","476.19047620"],["0.00000022","454.54545460"],["0.00000023","434.78260870"],["0.00000024","416.70000000"],["0.00000025","400.00000000"],["0.00000026","384.61538470"],["0.00000027","370.37037130"],["0.00000028","357.14285720"],["0.00000029","344.82758630"],["0.00000030","1219.33333340"],["0.00000031","1248.58064520"],["0.00000032","312.50000000"],["0.00000033","303.13013010"],["0.00000034","768.26469940"],["0.00000035","2193.00000000"],["0.00000036","62631.58210000"],["0.00000037","1213389.24324251"],["0.00000038","48152.21209183"],["0.00000039","2000.00000000"]]}

gettradehistory
View Online

method: gettradehistory

Inputs: coin,start,end

coin                    code of the coin being traded.
start                   start date  (ex: 1472237476)
end                     end date (ex: 1472237618) 

Example Output:

[{"tradeid":"3375","date":"2016-08-26 18:53:38","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3374","date":"2016-08-26 18:53:38","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3373","date":"2016-08-26 18:53:37","type":"sell","rate":"0.00000039","amount":"300.00000000","total":"0.00011700"},{"tradeid":"3372","date":"2016-08-26 18:53:37","type":"sell","rate":"0.00000039","amount":"300.00000000","total":"0.00011700"},{"tradeid":"3371","date":"2016-08-26 18:53:37","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3370","date":"2016-08-26 18:53:37","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3369","date":"2016-08-26 18:53:36","type":"sell","rate":"0.00000039","amount":"300.00000000","total":"0.00011700"},{"tradeid":"3368","date":"2016-08-26 18:53:36","type":"sell","rate":"0.00000039","amount":"300.00000000","total":"0.00011700"},{"tradeid":"3367","date":"2016-08-26 18:53:36","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3366","date":"2016-08-26 18:53:35","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"},{"tradeid":"3365","date":"2016-08-26 18:53:35","type":"sell","rate":"0.00000039","amount":"300.00000000","total":"0.00011700"},{"tradeid":"3364","date":"2016-08-26 18:53:34","type":"buy","rate":"0.00000041","amount":"420.00000000","total":"0.00017220"}]

getcoins
View Online

method: getcoins

Inputs: N/A
Example Output:

{"LTC":{"id":"2","name":"Litecoin","website":"www.litecoin.org","withdrawfee":"0.001","minconfs":"6","makerfee":"0","takerfee":"0.3","disabled":"0"},"DOGE":{"id":"4","name":"Dogecoin","website":"www.dogecoin.com","withdrawfee":"5","minconfs":"6","makerfee":"0","takerfee":"0.3","disabled":"0"},"ETH":{"id":"10","name":"Ethereum","website":"www.ethereum.org","withdrawfee":"0.01","minconfs":"50","makerfee":"0","takerfee":"0.3","disabled":"0"},"DASH":{"id":"12","name":"Dash","website":"www.dash.org","withdrawfee":"0.05","minconfs":"2","makerfee":"0","takerfee":"0.3","disabled":"0"},"PPC":{"id":"13","name":"Peercoin","website":"www.peercoin.org","withdrawfee":"0.1","minconfs":"2","makerfee":"0","takerfee":"0.3","disabled":"0"}}

Authenticated API


Required API keys can be obtained on the Settings page, API tab.

Authenticated HTTP POST requests to https://tuxexchange.com must contain the following HTTP header values:

Key - Your API public key.
Sign - The query's POST data signed by your key's "secret" or "private key" according to the HMAC-SHA512 method.

All queries must include a "nonce" value. The nonce parameter is an integer which must always be greater than the previous nonce used.
getmybalances

method: getmybalances

Inputs: None
Return Data:

coin                    code of the coin.
balance                 Balance amount. 
inorders                Balance in orders. 

Return Data:

{
    "BTC": {
        "balance": "791793899",
        "inorders": 0
    },
    "LTC": {
        "balance": "113107578",
        "inorders": 0
    },
    "DOGE": {
        "balance": "41994",
        "inorders": 0
    }
}

getmywithdrawhistory

method: getmywithdrawhistory

Inputs: None

Return Data:

coin                    code of the coin.
amount                  Amount withdrawn. 
toaddress               Address coins were sent to. 
hash                    TX ID of transaction. 
status                  Status of the withdraw request. 

Return Data:

{
   "12": {
        "coin": "DOGE",
        "amount": "791",
        "toaddress": "DGAQm5dJ9awTWqbnfXg2PLgPoUJ1aPLVMr",
        "hash": "",
        "status": "failed nsf"
    },
    "143": {
        "coin": "DOGE",
        "amount": "10000",
        "toaddress": "DBkNQX9A44na2eUT5ZLxEeB3nAH6kAHGGs",
        "hash": "02139e29cadd15047fb2115c0eeb17fd295b9e0e11f222affe26b33d9718c2a7",
        "status": "success"
    }

}

getmydeposithistory

method: getmydeposithistory

Inputs: List deposit addresses.

coin                    code of the coin deposit address.
amount                  Amount withdraw. 
address                 Deposit address for coin.
date                    Date of withdraw. 
txid                    Transaction ID. 

Return Data:

{
    "365": {
        "coin": "DOGE",
        "amount": "3",
        "address": "D7ssLc8M4L3bKaku232GBeqxshbbD43hFM",
        "date": "2016-02-11 21:23:44",
        "txid": "ae4d47bc130ac8e2e1960ee3c3545963a380f6ef268d384f8fc3d6a2220c92fb"
    }
}

getmyaddresses

method: getmyaddresses

Inputs: List deposit addresses.

coin                    code of the coin deposit address.
address                 Deposit address for coin. 

Example Output:

{
    "addresses": {
        "BTC": "14iuWRBwB35HYG98vBxmVJoJZG73BZy4bZ",
        "LTC": "LXLWHFLpPbcKx69diMVEXVLAzSMXsyrQH2",
        "DOGE": "DGon17FjjTTVXaHeotm1gvw6ewUZ49WeZr",
    }
}

getmytradehistory

method: getmytradehistory

Inputs: None

coin                    code of the coin being traded.
type                    type of order (Options: buy/sell)
amount                  amount of desired coin to trade
price                   price to place trade

method: buy


Inputs: coin, amount, price


market		 	market code (Ex. BTC).	
coin			code of the coin being traded.
amount			amount of desired coin to trade
price			price to place trade

Return data:

(
    [success] => 1
)

method: sell


Inputs: Coin,Amount,Price


market		 	market code (Ex. BTC).	
coin                    code of the coin being traded.
amount                  Amount of desired coin to trade
price                   Price to place trade

Example Output:

(
    [success] => 1
    [error] => Array
        (
            [0] =>61 
            [1] => Sell order placed.
        )

)

method: getmyopenorders


Inputs: None


coin                    code of the coin being traded.
type                    Type of order (Options: buy/sell)
amount                  Amount of desired coin to trade
price                   Price to place trade

withdraw

method: withdraw

Inputs: Coin,Address,Amount

coin                    code of the coin to withdraw
address                 Address to withdraw to
amount                  Amount of coin to withdraw 

Example Output:

(
    [success] => 1
    [error] => Array
        (
            [0] => Withdraw requested.
        )

)

cancelorder

method: cancelorder

Inputs:

id                 	Order ID of trade you would like to cancel. 
market		  	Market name (i.e. BTC)

PHP EXample Client
```
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
```
