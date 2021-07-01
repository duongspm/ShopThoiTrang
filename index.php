<?php 
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "testing");
        
    function add(){					
        $connect = mysqli_connect("localhost", "root", "", "testing");
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
<html>
<head>
    <title>Home | Trang Chủ</title>
</head>
<body>
    <!-- Slider -->
    <?php
        include 'include/slider.php';
    ?>
    
    <!--Sản phẩm -->
    
	<div class="index-product">
        <div class="container">
            <div class="row">
                <meta charset="utf-8" />
                    <?php
                        $sql_product = mysqli_query($conn,"SELECT * FROM sanpham ORDER BY MaSP ASC"); 
                        //$result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($sql_product) > 0)
                        {		
                            while($row = mysqli_fetch_array($sql_product))
                            {
                    ?>
                <div class="col-sm-4 col-md-4 prod">
                    
                    <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["MaSP"]; ?>">
                        <!--?php	echo '<img src='.$row['image'].' />';?-->
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
                    <form action="index.php" method="post">
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
			
<!-- Footer -->
	<!-- footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->	
</body>
</html>

