<?php
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
    // Gets input data 
    $Model = $_POST["model_delete"];
    
    // Creates query 
    $query_delete_product = "DELETE FROM Product_Model_Info 
        WHERE Manufacturer_Email LIKE '$Company_Email' AND Model_Name LIKE '$Model'";
    // If statement is actually redundant but it sends the query in this case.
    if ($conn->query($query_delete_product) === FALSE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    // Keeps user on the same page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $conn->close();
?>