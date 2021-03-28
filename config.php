<?php

 // Include autoloader
require_once(__DIR__.'/Facebook/autoload.php');

define('APP_ID', '909487206554799');
define('APP_SECRET', '5beeb6d0dde259e8e87f7d22ef70f2e9');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'http://localhost/fb-login/');

define('BASE_URL', 'http://localhost/fb-login/');

if(!session_id()){
    session_start();
}


// fb api callback
$fb = new Facebook\Facebook([
 'app_id' => APP_ID,
 'app_secret' => APP_SECRET,
 'default_graph_version' => API_VERSION,
]);


// Get redirect helper
$fb_helper = $fb->getRedirectLoginHelper();


// access token
try {
    if(isset($_SESSION['facebook_access_token']))
		{$accessToken = $_SESSION['facebook_access_token'];}
	else
		{$accessToken = $fb_helper->getAccessToken();}
} catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
}

?>