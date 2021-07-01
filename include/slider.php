<div class="slide-show">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block slide-pic" src="images/banner3.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Nike</h1>
                        <h4 style="color:black">See how good they feel.</h4>
                        <a href="products.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block slide-pic" src="images/banner4.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Adidas</h1>
                        <h4 style="color:black">For All Walks of Life.</h4>
                        <a href="products.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br>
	<br>
    <div class="container index-category">
        <div class="row">
            <?php
                $sql_slider = mysqli_query($conn,"SELECT * FROM loaisanpham where TrangThaiLoaiSP ='1' ORDER BY MaLoai");
                while($row_slider = mysqli_fetch_array($sql_slider))
                {
            ?>
            <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-2">
                <img class="d-block slide-pic" src="images/<?php echo $row_slider['HinhAnhLoaiSP']?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black"><a href="products.php"><?php echo $row_slider['TenLoaiSP']?></a></h1>
                        <h4 style="color:black"><?php echo $row_slider['ChuThichLoaiSP']?></h4>
                    </div>
                </div>
                <br>
            </div>
            <?php
                }
            ?>
            <!-- <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-2">
                    <img src="images/banner1.jpg">
                    <br>
                    <br>
                    <div class="top-left">
                        
                    </div>
                </div>
            </div> -->
            
            
        </div>
        <div class="top_main">
		<h2>Hot products</h2>
		<a href="products.php">show all</a>
		<div class="clear"></div>
    </div>