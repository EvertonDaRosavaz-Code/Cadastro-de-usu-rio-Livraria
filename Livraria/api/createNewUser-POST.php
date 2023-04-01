<?php


function createUserAPI($nome, $email, $senha, $data){

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "localhost:4001/login",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>
       "{
            \n  \"nome\" : \"$nome\",
            \n  \"email\":\"$email\",
            \n  \"senha\":\"$senha\",
            \n  \"data\" :\"$data\"\n
        }",
      CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "Content-Type: application/json",
        "User-Agent: Thunder Client (https://www.thunderclient.com)"
      ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
}

