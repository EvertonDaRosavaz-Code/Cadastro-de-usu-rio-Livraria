<?php
    // Me retorna um array dos dados do usuariu conforme o email;
 function  getemail ($email){
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "4001",
    CURLOPT_URL => "http://localhost:4001/getEmail/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{\n\t\"email\":\"$email\"\n}",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
        $res =  json_decode($response, true);
        return $res;
    }

}














