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

      

    $User = $_POST["user_delete"];
    
    $query_delete_product = "DELETE FROM User_Info
        WHERE Email LIKE '$User'";
    if ($conn->query($query_delete_product) === FALSE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $conn->close();
?>