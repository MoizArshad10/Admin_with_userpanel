<?php 
    include("header.php");
?>

<div class="inner">
							<!-- About Us -->
							<header id="inner">
								<h1>Find your new book!</h1>
								<p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
							</header>

							<br>

							<h2 class="h2">Available Categories</h2>

							<!-- Products -->
							<section class="tiles">
                                <?php 
                                
                                    $sql = "select * from category ";
                                    $result = mysqli_query($conn , $sql);
                                    while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                    <article class="style1">
									<span class="image">
                                        <?php 
                                            echo "<img src=\" ../../../../Admin/images/upload_images/{$rows['image']} \" height=300px;width=300px>"
                                        ?>
                                </span>
									<a href="products.php?id=<?php echo $rows['id']?>">
										<h2><?php echo $rows['CategoryName']?></h2>
										
										<p><del>$19.00</del> <strong>$19.00</strong></p>

										<p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
									</a>
								</article>
                                    <?php }?>
                            </section>
</div>

<?php 

    include("footer.php");
?>