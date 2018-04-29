<?php

$curlSession = curl_init();

if($curlSession)
{
    // $url = "https://visionary.com";
    $url = "http://dmaccportfolioday.com";
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    $pageText = curl_exec($curlSession);

    curl_close($curlSession);
    var_dump($pageText);
}





?>