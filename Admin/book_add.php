<?php

    include("header.php");
    include("connection.php");
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>

                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Book Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                    <form method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Auth Id</label>
                                                <select id="inputState" name="b_a_id" class="form-control">
                                                    <?php 
                                                        $sql ="select * from authors";
                                                        $result = mysqli_query($conn, $sql);

                                                        while($rows = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <option value="<?php echo $rows['id']?>"><?php echo $rows['author_name']?></option>
                                                       <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Cat Id</label>
                                                <select id="inputState" name="b_c_id" class="form-control">
                                                    <?php 

                                                        $sql ="select * from category";
                                                        $result = mysqli_query($conn , $sql);
                                                        while($rows = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <option value="<?php echo $rows['id']?>"><?php echo $rows['CategoryName']?></option>    
                                                       <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Book Name</label>
                                                <input type="text" name="bookname" class="form-control" placeholder="Enter Your Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Description</label>
                                                <input type="text" name="description" class="form-control" placeholder="Description">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Price</label>
                                                <input type="number" name="price" class="form-control" placeholder="Price">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Book Image</label>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Book Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


<?php
    if(isset($_POST['submit'])){
        $author = $_POST['b_a_id'];
        $category = $_POST['b_c_id'];
        $bookname = $_POST['bookname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $sql = "insert into books(Bookname , Description , Price, CatId_FK, AuthId_FK, BookImage) values('$bookname','$description','$price','$category','$author','$image')";
        $result = mysqli_query($conn, $sql);
        if(isset($_FILES)){
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_type = $_FILES['image']['type'];
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp ,"images/upload_images/"
            .$file_name);
        }
        echo "<script>
        alert('Book Added Successfully!');
        window.location.href='book_show.php';
        </script>";
    }
    include("footer.php");
?>