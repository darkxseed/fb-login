<?php

 
require_once 'config.php';

$permissions = ['email']; 

if (isset($accessToken))
{
	if (!isset($_SESSION['facebook_access_token'])) 
	{

		$_SESSION['facebook_access_token'] = (string) $accessToken;
		
		$oAuth2Client = $fb->getOAuth2Client();

		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} 
	else 
	{
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
	if (isset($_GET['code'])) 
	{
		header('Location: ./');
	}
	
	
	try {
		$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
		$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
		
		$fb_user = $fb_response->getGraphUser();
		$picture = $fb_response_picture->getGraphUser();
		

		
		$_SESSION['user'] = array(
            'id'          => '',
            'external_id' => $fb_user->getProperty('id'),
			'username'    => $fb_user->getProperty('name'),
			'email'       => $fb_user->getProperty('email'),
            'pic'         => $picture['url']
);
		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Facebook API Error: ' . $e->getMessage();
		session_destroy();
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK Error: ' . $e->getMessage();
		exit;
	}
} 
else 
{	
	
	
@$fb_login_url = $fb_helper->getLoginUrl('http://localhost/fb-login/', $permissions);
}
