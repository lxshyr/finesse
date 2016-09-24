<?php
phpinfo();

// $ch = curl_init('https://www.howsmyssl.com/a/check');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $data = curl_exec($ch);
// curl_close($ch);

// $json = json_decode($data);
// echo $json->tls_version;
return;
$GLOBALS['client_id'] = "57d58dd7bb37a5b31b0811a4";
$GLOBALS['secret']    = "d533494553078dab4eefd98f56481e";
$data = json_decode(file_get_contents('php://input'));

if ($data->action == 'authenticate') {
	create_account($data->user_name, $data->public_token);
}

function create_account($user_name, $public_token) {
	$url = "https://tartan.plaid.com/exchange_token";
	$fields = [
		'client_id' => $GLOBALS['client_id'],
		'secret' => $GLOBALS['secret'],
		'public_token' => $public_token,
	];
	
	// $ch = curl_init($url);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 //    	'Content-Type: application/json'
 //    ));
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch,CURLOPT_POST, 1);
	// curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
	
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        // CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        // CURLOPT_FORBID_REUSE => 1, 
        // CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($fields),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        // CURLOPT_SSLVERSION => 3,
        CURLOPT_SSL_CIPHER_LIST => 'TLSv1'
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, $defaults);

	$result = curl_exec($ch);
	if (! $result) {
		print curl_error($ch); 
	}
	curl_close($ch);
	print json_encode($fields);
	print "\n\n";
	var_dump($result);
}

function connect($user_name, $access_token, $account_details) {
	// Save this account for this user
}

function get_transactions_from_account($user_name) {

}

?>