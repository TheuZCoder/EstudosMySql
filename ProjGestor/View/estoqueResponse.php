<?php 
function fetch_estoque_data() {
    $url = 'http://localhost:8080/estoque';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return [];
    }

    return json_decode($response, true);
}
?>
