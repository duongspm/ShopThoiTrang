<!------ Include the above in your HEAD tag ---------->
<?php 
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "shop");
    function add(){					
        $connect = mysqli_connect("localhost", "root", "", "shop");
        $sql = "INSERT INTO cart(id,name,image,price,quantity)
                values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}',1)";
                                
        if ($connect->query($sql) === TRUE) {
            echo "";
        } else {
            echo "";
        }
                                
    }

    if(array_key_exists('add',$_POST)){
        add();	
    }
?>
<?php
    include_once('connect/database.php')
?>
<?php
    include 'include/header.php';
?>
<?php
    include 'include/head.php';
?>
<?php
    include 'include/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product | Sản Phẩm</title>
</head>
<body>
    <div class="products">
            
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Tất cả sản phẩm</a>
            </li>
            <?php
                $sql_slider = mysqli_query($conn,"SELECT * FROM loaisanpham where TrangThaiLoaiSP ='1' ORDER BY MaLoai");
                while($row_slider = mysqli_fetch_array($sql_slider))
                {
            ?>
            <li id= "value" class="nav-item" value="<?php echo $row_slider['MaLoai']?>">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false"><?php echo $row_slider['TenLoaiSP']?></a>
                </li>
            <?php
                }
            ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <!--  -->
         	
		    <br>		
		    <br>
            <div class="index-product">
                <div class="container">
                    <div class="row">
                        <?php
                            $sql_product = mysqli_query($conn,"SELECT * FROM sanpham ORDER BY MaSP ASC"); 
                            if(mysqli_num_rows($sql_product) > 0)
                            {		
                                while($row = mysqli_fetch_array($sql_product))
                                {
                        ?>				
                        <div class="col-sm-4 col-md-4 prod">
                            <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["MaSP"]; ?>">
                            <img class="hinhanh" src="admin/products/<?php echo $row['HinhAnhSP']?>">
                                <div class="product-index-info">
                                    <h3><?php echo $row["TenSP"]; ?></h3>
                                    <p><?php echo number_format($row["GiaSP"]);?> &#x20AB;</p>
                                </div>
                                <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                <input type="hidden" name="hidden_des" value="<?php echo $row["MoTaSP"]; ?>" />
                                <input type="hidden" name="hidden_size" value="<?php echo $row["Size"]; ?>" />
                                <input type="hidden" name="hidden_color" value="<?php echo $row["MauSacSP"]; ?>" /> 
                                <div class="button">
                                    <button class="btn btn-success" type="submit">Detail</button>
                                </div>
                            </form>	
                            <form action="products.php" method="post">
                                <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                <input type="hidden" name="hidden_products" value="<?php echo $row["MaLoai"]; ?>" />
                                <div class="button">
                                    <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                                </div>
                            </form>
                
                            <br>		
                            <br>
                        </div>

                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
					
        <br>		
		<br>
             
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="index-product">
                <div class="container">
                    <div class="row">
                        <?php			
                            $connect = mysqli_connect("localhost", "root", "", "shop");
                            $query = "SELECT * FROM sanpham WHERE MaLoai='3'";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {		
                        ?>
                            <div class="col-sm-4 col-md-4 prod">
                                <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["MaSP"]; ?>">
                                <img class="hinhanh" src="admin/products/<?php echo $row['HinhAnhSP']?>">
                                    <div class="product-index-info">
                                        <h3><?php echo $row["TenSP"]; ?></h3>
                                        <p><?php echo number_format($row["GiaSP"]);?> &#x20AB;</p>
                                    </div>
                                    <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                    <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                    <input type="hidden" name="hidden_des" value="<?php echo $row["MoTaSP"]; ?>" />
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["Size"]; ?>" />
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["MauSacSP"]; ?>" /> 
                                    <div class="button">
                                        <button class="btn btn-success" type="submit">Xem chi tiết</button>
                                    </div>
                                </form>	
                                <form action="products.php" method="post">
                                    <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                    <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                    <input type="hidden" name="hidden_products" value="<?php echo $row["MaLoai"]; ?>" />
                                    <div class="button">
                                        <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                                    </div>
                                </form>
                                <br>		
                                <br>
                                
                            </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="index-product">
                <div class="container">
                    <div class="row">
                        <br>		
                        <br>
                            <?php			
                                $connect = mysqli_connect("localhost", "root", "", "shop");
                                $query = "SELECT * FROM sanpham WHERE MaLoai=1";
                                $result = mysqli_query($connect, $query);
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                            ?>
                                <div class="col-sm-4 col-md-4 prod">
                                    <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["MaSP"]; ?>">
                                    <img class="hinhanh" src="admin/products/<?php echo $row['HinhAnhSP']?>">
                                        <div class="product-index-info">
                                            <h3><?php echo $row["TenSP"]; ?></h3>
                                            <p><?php echo number_format($row["GiaSP"]);?> &#x20AB;</p>
                                        </div>
                                            <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                            <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                            <input type="hidden" name="hidden_des" value="<?php echo $row["MoTaSP"]; ?>" />
                                            <input type="hidden" name="hidden_size" value="<?php echo $row["Size"]; ?>" />
                                            <input type="hidden" name="hidden_color" value="<?php echo $row["MauSacSP"]; ?>" /> 
                                        <div class="button">
                                            <button class="btn btn-success" type="submit">Detail</button>
                                        </div>
                                    </form>	
                                    <form action="products.php" method="post">
                                        <input type="hidden" name="hidden_img" value="<?php echo $row["HinhAnhSP"]; ?>"/>
                                        <input type="hidden" name="hidden_id" value="<?php echo $row["MaSP"]; ?>"/>
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["GiaSP"]; ?>" />
                                        <input type="hidden" name="hidden_products" value="<?php echo $row["MaLoai"]; ?>" />
                                        <div class="button">
                                            <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                                        </div>
                                    </form>
                                    
                                    <br>		
                                    <br>
                                </div>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>			
        </div>
    </div>

   <!-- Footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->
</body>
</html>