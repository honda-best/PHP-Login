<?php

$params = array(
    'client_id'     => $clientId,
    'client_secret' => $clientSecret,
    'code'          => $_GET['code'],
    'redirect_uri'  => $redirectUri
);

if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
    $error = error_get_last();
    throw new Exception('HTTP request failed. Error: ' . $error['message']);
}

$response = json_decode($content);

if (isset($response->error)) {
    throw new Exception('Error: ' . $response->error . '. Error description: ' . $response->error_description);
}

$token = $response->access_token; 
$expiresIn = $response->expires_in; 
$userId = $response->user_id; 

$_SESSION['token'] = $token;
echo 'token-'.$_SESSION['token'];
?>