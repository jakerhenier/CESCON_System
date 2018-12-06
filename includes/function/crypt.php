<?php
function encrypt_decrypt($string, $action) {
    
    $secret_key = md5("warren");
    $secret_iv = md5("warren");
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
    if($action == "encrypt") {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    }
    else if($action == "decrypt") {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
 
    return $output;
}
?>