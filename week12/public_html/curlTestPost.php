<?php
$curlSession = curl_init();

if($curlSession)
{
    // $url = "https://visionary.com";
    // $url = "http://dmaccportfolioday.com";
    $url = "http://localhost/AdvancedPHPNOTES/week11/public_html/user-edit.php";
    // $dataArray = array
    // (
    //     "userName" =>"",
    //     "password" =>"",
    //     "user_level"=>"",
    //     "user_id"=>"",
    //     "Save"=>""
    // );

    $dataArray = array
    (
        "userName" =>"testcurl",
        "password" =>"test1",
        "user_level"=>"100",
        "user_id"=>"",
        "Save"=>""
    );

    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($curlSession, CURLOPT_POST, true);
    curl_setopt($curlSession, CURL_POSTFIELDS, $dataArray);

    var_dump(curl_error($curlSession));

    $pageText = curl_exec($curlSession);

    curl_close($curlSession);

    var_dump($pageText);
}



?>