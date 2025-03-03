<?php
$url = $_GET['url'];
if (!empty($url)) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
} else {
    echo "URL parameter is missing.";
}
?>