<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "another_book";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!$conn){
        die("Connection Failed");
    }

?>