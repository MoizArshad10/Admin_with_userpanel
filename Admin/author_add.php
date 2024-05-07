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
                            <span class="ml-1">Author</span>
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
                                <h4 class="card-title">Author Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Author Name</label>
                                                <input type="text" name="author_name" class="form-control" placeholder="Enter Author Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Date Of Birth</label>
                                                <input type="date" name="date" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Location</label>
                                                <input type="location" name="location" class="form-control" placeholder="Location">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Select your Image</label>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                           
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Author</button>
                                    </form>
                                </div>
                            </div>
                        </div>


<?php 

    if(isset($_POST['submit'])){
        $author_name = $_POST['author_name'];
        $dob = $_POST['date'];
        $location = $_POST['location'];
        $image = $_FILES['image']['name'];

        if(isset($_FILES)){
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_type = $_FILES['image']['type'];
            $file_tmp = $_FILES['image']['tmp_name'];

            move_uploaded_file($file_tmp , "images/upload_images/" .$file_name);

            $sql = "insert into authors(author_name , dob , location , image) values('$author_name' , '$dob' , '$location' , '$image')";
            $result = mysqli_query($conn , $sql);

            echo "<script>
                alert('Author added Successfully');
                </script>";
            }
        }
        include("footer.php");
        ?>