<?php 
    include("connection.php");

    $Id = $_GET['id'];
    $sql = "delete from books where id = $Id";
    $result = mysqli_query($conn , $sql);

    echo "<script>
        alert('book deleted Successfully');
        window.location.href = 'book_show.php';
    </script>";
?>


