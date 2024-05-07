<?php 
    include("header.php");
?>

<!-- Products -->
<section class="tiles">
                                <?php 
                                
                                    $sql = "select * from authors ";
                                    $result = mysqli_query($conn , $sql);
                                    while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                    <article class="style1">
									<span class="image">
                                        <?php 
                                            echo "<img src=\" ../../../../Admin/images/upload_images/{$rows['image']} \" height=300px;width=300px>"
                                        ?>
                                </span>
									<a href="product.php?id=<?php echo $rows['id'] ?>">
										<h2><?php echo $rows['author_name']?></h2>
										
										<p><del>$19.00</del> <strong>$19.00</strong></p>

										<p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
									</a>
								</article>
                                <?php }?>
                            </div>
                        </section>
                       

<?php 

    include("footer.php");
?>