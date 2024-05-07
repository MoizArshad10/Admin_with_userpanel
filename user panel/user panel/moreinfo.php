<?php 

    include("header.php");
    $Id = $_GET['id'];
    $sql = "select * from `books` WHERE id = $Id";
    $res = mysqli_query($conn,$sql);
    $d1 = mysqli_fetch_assoc($res);
    ?>
    <h1 class="text-center"><?php echo $d1['Bookname']?></h1>
    
    <div id="main">
        <div class="inner">
            <h1></h1>
    
            <div class="container-fluid">
                        <?php
                        $qry = "select * from books WHERE Id= $Id";
                        $result = mysqli_query($conn, $qry);
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <img src="../../Admin/images/upload_images/<?php echo $data['BookImage'] ?> "  class="img-fluid">
                    </div>
    
                    <div class="col-lg-6 col-md-12">
                            <p><?php echo $data['Description'] ?></p>
                            <p><?php echo $data['Price'] ?></p>
                            <div class="col-sm-6">
                                <input type="submit" class="primary" value="Add to Cart">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

<?php 
    include("footer.php");
?>