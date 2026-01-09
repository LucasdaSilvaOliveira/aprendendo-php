<?php

$url = "https://localhost:7061/api/Pessoa";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $arrayData = [
        "nome" => $nome,
        "idade" => $idade
    ];

    $jsonData = json_encode($arrayData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        'Content-Length: ' . strlen($jsonData)
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {
        echo 'Resposta da API: ' . $response;
    }

    unset($ch);
}


function getPessoas()
{
    global $url;

    $pessoas = json_decode(file_get_contents($url));
    return $pessoas;
}

?>