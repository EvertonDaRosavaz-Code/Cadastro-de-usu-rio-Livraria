<?php

//Me trazer as informações via email



function getemail  ($email){
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
        $id = $res['_id'];
        $nome = $res['nome'];
        $emaiil = $res['email'];
        $data = $res['data'];
        
        $arrayInfo = [$id, $nome, $emaiil, $data];
        return $arrayInfo;
    }

}

$res =  getemail('bianca@gmail.com');

echo ($res[0]);
echo $res[1];
echo $res[2];

var_dump($res);






