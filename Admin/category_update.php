

<?php 

    include("header.php");
    include("connection.php");

    $Id = $_GET["id"];
    $sql = "select * from category where id =$Id";
    $result = mysqli_query($conn , $sql);
    $rows = mysqli_fetch_assoc($result);

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
                                <h4 class="card-title">Category Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category Name</label>
                                            
                                                    <input type="text" name="CategoryName" class="form-control" value="<?php echo $rows ['CategoryName']?>" placeholder="CategoryName">

                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Category Image</label>
                                                    <input type="file" value="<?php
                                                    echo $rows['image']?>"  name="image" class="form-control" >
                                                </div>

                                           
                                        </div>
                                        
                                        <button type="submit" name="update" class="btn btn-primary">Update Category </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


<?php

if(isset($_POST['update'])){

   
    $categoryName = $_POST['CategoryName'];
    $categoryImage = $_FILES['image']['name'];

    $sql = "update category set CategoryName = '$categoryName' , image = '$categoryImage'  where id = $Id ";
    $result = mysqli_query($conn, $sql);

    if(isset($_FILES)){
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp ,"images/upload_images/" .$file_name);
    }

    echo "<script>
        alert('update category successfully');
        window.location.href='category_show.php';
    </script>";
}
include("footer.php");

?>