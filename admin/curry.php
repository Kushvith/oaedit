<?php
    require_once 'vendor/autoload.php';
    $google_client = new Google_Client();
    $google_client->setClientId('781057857577-o1qjgka94vd35eu8tv28c1ifk40fa8bq.apps.googleusercontent.com');
    $google_client->setClientSecret('AV-llNWUhgCI8IA4wwbckEDV');
    $google_client->setRedirectUri('http://localhost/oaedit/admin/index.php');
    $google_client->addScope('email');
    $google_client->addScope('profile');
    session_start();
    
?>