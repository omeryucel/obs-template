<?php  session_start();
    include "../includes/config.php";

     

    $userName = $_POST["userName"];
    $password = $_POST["password"]; 

    $jsonFile["password"]= $password; 
    $jsonFile["username"]= $userName ;  

    $jsonFile = json_encode($jsonFile);
    

    $url = "http://127.0.0.1:8000/rest-auth/login/?format=json";
    $response = \Httpful\Request::post($url) 
        ->addHeaders(array( 
            'Content-Type' => 'application/json',
        ))
        ->parseWith(function($body) {
            return explode(",", $body);
        }) 
        ->body($jsonFile) 
        ->sendsJson() 
        ->send(); 


    $response = json_decode($response,true);
    $result =  Array();
    @$key = $response["key"];
    $result["success"]="";
    $result["error"]="";
    $result["status"]=0;
    if(empty($key)){
        $result["error"] = "Hatalı bilgiler girdiniz.";
        $result["status"]=0;
    }
    else{
        $result["success"] = "Giris Başarılı";
        $result["status"]=1;
        $_SESSION["key"] = $key;
        $_SESSION["userName"] = $userName;
    }
 
    echo json_encode(array("status" => $result["status"],"result" =>$result["success"],"error" =>$result["error"]));