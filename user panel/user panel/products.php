<?php 

    include("header.php");
    
    $res = null;

    // Author

    if(isset($_GET['id'])){
        $q = mysqli_real_escape_string($conn , $_GET['id']);
        $w = "select * from books
        join category on category.id= books.CatId_FK
        join authors on authors.id = books.AuthId_FK
        where AuthId_FK = '$q'";
    }

    // Category

    else if(isset($_GET['id'])){
        $q = mysqli_real_escape_string($conn , $_GET['id']);
        $w = "select * from books
        join category on category.id= books.CatId_FK
        join authors on authors.id = books.AuthId_FK
        where CatId_FK = '$q'";
    }

    // All Books

    else{
       
        $w = "select books .* , category.CategoryName , authors.author_name from books
        join category on category.id= books.CatId_FK
        join authors on authors.id = books.AuthId_FK";
    }

    $res = mysqli_query($conn , $w);
?>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <?php while($data = mysqli_fetch_assoc($res)) { ?>
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card p-0 border-primary rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="../../Admin/images/upload_images/<?php echo $data['BookImage'] ?> " alt="course thumb" height="200px" width="200px">
                    <div class="card-body">
                        <a href="course-single.html">
                            <h4 class="card-title"><?php echo $data['Bookname'] ?></h4>
                        </a>
                        <p class="card-text mb-4"> <?php echo $data['Description'] ?></p>
                        <p class="card-text mb-4"> <?php echo $data['author_name'] ?></p>
                        <p class="card-text mb-4"> <?php echo $data['CategoryName'] ?></p>
                        <p class="card-text mb-4"> <?php echo $data['Price'] ?></p>
                        <a href="moreinfo.php?id=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php 
    include("footer.php");
?>