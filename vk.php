<?php
session_start();
 
// Параметры 
$clientId     = '1'; // ID приложения
$clientSecret = 'mysecretkey'; // Защищённый ключ
$redirectUri  = 'http://localhost/vk_login.php'; // Адрес куда будет переадресован пользователь после авторизации
 

$params = array(
	'client_id'     => $clientId,
	'redirect_uri'  => $redirectUri,
	'response_type' => 'code',
	'v'             => '5.126', 
	'scope'         => 'photos,offline',
);

echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '">Авторизация через ВКонтакте</a>';