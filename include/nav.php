<div class="navigation">
<?php
    include_once 'connect/database.php';
    $sql_category = 'SELECT * FROM loaisanpham ORDER BY MaLoai DESC';
    $fetch_category = mysqli_query($conn,$sql_category);
?>
        <!--nền tối : bg-dark navbar-dark fixed-top --> 
        <nav class="navbar navbar-expand-sm">
            <!--img class="navbar-brand" src="./images/Logo.png"-->
            <h2 class="col-md-3 footer-left"><a href="index.php"><strong>C</strong>amper Store</a></h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo 'index.php';?>">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- Dropdown -->
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Sản Phẩm
                        </a>
                        <div class="dropdown-menu">
                        <?php
                            while($row_category = mysqli_fetch_array($fetch_category))
                            {
                        ?>
                            <a class="dropdown-item" href="#" value="<?php echo $row_category['MaLoai']?>">
                                <?php echo $row_category['TenLoaiSP']?>
                            </a>
                        <?php
                            }
                        ?>    
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Giới Thiệu</a>
                    </li>
                </ul>
                <form method="post" action="search.php" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="searchproduct" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name= "search" type="submit">Search</button>
					<a class="button custom" href="<?php echo "cart.php";?>" method="get"><i class="fas fa-shopping-cart"></i></a>
                    <span class='badge badge-warning' id='lblCartCount'></span>
                   
                </form>
            </div>
            <a href="login.php"><i class='fas fa-user' style='font-size:36px'></i></a>
        </nav>
    </div>
