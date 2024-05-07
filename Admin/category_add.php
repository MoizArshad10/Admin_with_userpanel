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
                                <h4 class="card-title">Category Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category Name</label>
                                                <input type="text" name="CategoryName" class="form-control" placeholder="CategoryName">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Category Image</label>
                                                <input type="file" name="image" class="form-control" >
                                            </div>

                                           
                                        </div>
                                        
                                        <button type="submit" name="add" class="btn btn-primary">Category Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

<?php

    if(isset($_POST['add'])){
        $categoryName = $_POST['CategoryName'];
        $categoryImage = $_FILES['image']['name'];

        $sql = "insert into category (CategoryName , image) values('$categoryName' , '$categoryImage')";
        $result = mysqli_query($conn , $sql);

        if(isset($_FILES)){
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];

            move_uploaded_file($file_tmp ,"images/upload_images/" .$file_name );
        }

        echo "<script>
        alert('category added Successfully');
        window.location.href='category_show.php';
        </script>";
    }

    include("footer.php");
?>