<?php
    
    include("connection.php");

    $Id = $_GET["id"];
    $sql = "delete from category where id = $Id";
    $result = mysqli_query($conn , $sql);

    echo "<script>
    alert('delete successfully');
    window.location.href='category_show.php';
    </script>";

?>