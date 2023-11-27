<?php
    // This page handles our update query.
    $servername = "localhost";
    $username = "root";
    $password ="root";
    $database = "catalogue";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }
    else {
        echo "Connection Successful!";
    }

    // Gets the company email from the page url to be used here
    $str = $_SERVER['HTTP_REFERER'];
    $qs = parse_url($str, PHP_URL_QUERY);      
    $Company_Email = "";
    if(!empty($qs)){
        parse_str($qs, $output);
        $Company_Email = $output['email']; 
    }  
                
    // Get input data
    $Model = $_POST["model"];
    $Product_Type = $_POST["producttype"];
    $Link = $_POST["link"];
    $Price = $_POST["price"];
    $GPU = $_POST["gpu"]; 	
    $CPU = $_POST["cpu"];
    $Operating_System = $_POST["os"];
    $Screen_Size = $_POST["screensize"];
    $Storage_Size = $_POST["storagesize"];
    $Battery_Life = $_POST["batterylife"];
    
    // Create query
    $query_update_products = "UPDATE Product_Model_Info 
    SET Product_Type = '$Product_Type',
    Link = '$Link', Price = $Price, GPU = '$GPU', CPU = '$CPU',
     Operating_System = '$Operating_System', Screen_Size = '$Screen_Size',
     Storage_Size = '$Storage_Size',
     Battery_Life = '$Battery_Life' WHERE Model_Name = '$Model'"; 
    // Sends query
    $conn->query($query_update_products);
    // Keeps user on same page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $conn->close();
?>