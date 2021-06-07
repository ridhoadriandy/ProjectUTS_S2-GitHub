<?php

include('../config/config.php');

$login_button = '';

if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        //print_r (data);
        if(!empty($data['name'])){
            $_SESSION['name'] = $data['name'];
        }
        
        if(!empty($data['family_name'])){
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if(!empty($data['email'])){
            $_SESSION['user_email_address'] = $data['email'];
        }

        if(!empty($data['gender'])){
            $_SESSION['user_gender'] = $data['gender'];
        }else{
            $_SESSION['user_gender'] = '-';
        }

        if(!empty($data['picture'])){
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

if(!isset($_SESSION['access_token'])){
    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="login-with-google-button-png-1.png" alt=""></a>';
}

?>