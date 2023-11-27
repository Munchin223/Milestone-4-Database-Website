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
    
    // Creates query 
    $query_get_products = "INSERT INTO Product_Model_Info 
    VALUES('$Model','$Company_Email','$Product_Type',
    (SELECT Brand_Name FROM Product_Company WHERE Email LIKE '$Company_Email'),
    '$Link','$Price','$GPU','$CPU','$Operating_System','$Screen_Size','$Storage_Size','$Battery_Life')"; 
    
    // If statement is actually redundant but it sends the query in this case.
    if ($conn->query($query_get_products) === FALSE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    // Keeps user on the same page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $conn->close();
?>