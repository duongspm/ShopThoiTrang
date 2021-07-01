<?php 
  session_start();
  $connect = mysqli_connect("localhost", "root", "", "testing");
?>
<!------ Include the above in your HEAD tag ---------->
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
    <title>Product detail | Chi Tiết sản phẩm</title>
</head>
<body>

<br>
<br>
<?php 
	if (isset($_POST['form-submit']));
	if(isset($_POST['addtocart'])){						
		$connect = mysqli_connect("localhost", "root", "", "testing");
    	$sql = "INSERT INTO cart(id,name,image,price)
        	    values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}')";
    	if ($connect->query($sql) === TRUE) {
      		echo "";
    	} 
		else{
      		echo "";
    		}		
  		}
?>			
				
<div class="container">
	<div class="card">
		<div class="container-fliud">
			<div class="wrapper row">

				<div class="preview col-md-6">
					<div class="preview-pic tab-content">
						<div class="tab-pane active" id="pic-1">  
							<img src="admin/products/<?php echo $_POST["hidden_img"]; ?>">
						</div>
						<div class="tab-pane" id="pic-2"><img src="images/product/<?php echo $_POST["hidden_img"]; ?>"></div>
						<div class="tab-pane" id="pic-3"><img src="images/product/<?php echo $_POST["hidden_img"]; ?>"></div>
						<div class="tab-pane" id="pic-4"><img src="images/product/<?php echo $_POST["hidden_img"]; ?>"></div>
					</div>
	
						<ul class="preview-thumbnail nav nav-tabs">
						<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="/product/<?php echo $_POST["hidden_img"]; ?>"/></a></li>
						<li><a data-target="#pic-2" data-toggle="tab"><img src="/product/<?php echo $_POST["hidden_img"]; ?>"/></a></li>
						<li><a data-target="#pic-3" data-toggle="tab"><img src="/product/<?php echo $_POST["hidden_img"]; ?>"/></a></li>
						<li><a data-target="#pic-4" data-toggle="tab"><img src="/product/<?php echo $_POST["hidden_img"]; ?>"/></a></li>
						</ul>

				</div>
				<div class="details col-md-6">
					<br>
					<h3 class="product-title"><?php echo $_POST['hidden_name'];?></h3>
					<hr/>
					<!-- Mô tả -->
					<div id="accordion">
						<div class="card">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapseOne">
							Mô tả sản phẩm  <i class='fas fa-align-center'></i>
							</a>
						</div>
						<div id="collapseOne" class="collapse show" data-parent="#accordion">
							<div class="card-body">
								<?php echo $_POST['hidden_des'] ?>
							</div>
						</div>
						</div>
					</div>
					<!-- Hết mô tả -->
					<br>
					<h5>Size: <?php echo $_POST['hidden_size']?></h5>
					<br>
					<h5>Màu sắc: <?php echo $_POST['hidden_color']?></h5>
					<br>
					
					<h4 class="price">Giá bán: <span><?php echo number_format($_POST['hidden_price'])?>&#x20AB;</h4>
					<form action="product-detail.php" method="post">
								<input type="hidden" name="hidden_id" value="<?php echo $_POST['hidden_id']; ?>"/>
								
								<input type="hidden" name="hidden_img" value="<?php echo $_POST['hidden_img']; ?>"/>

								<input type="hidden" name="hidden_name" value="<?php echo $_POST['hidden_name']; ?>" />

								<input type="hidden" name="hidden_price" value="<?php echo $_POST['hidden_price']; ?>" />
								
								<input type="hidden" name="hidden_des" value="<?php echo $_POST['hidden_des']; ?>" />
								
					<div class="action">
						<input class="add-to-cart btn btn-default" name="addtocart" type="submit" value="Thêm vào giỏ">
					</div>
					</form>
				</div>
			</div>
		</div>
		<br>
		<h4><i class='fas fa-shipping-fast' style='font-size:24px'></i><strong>	 HỖ TRỢ GIAO HÀNG VỚI HOÁ ĐƠN TRÊN 150.000 VNĐ</strong></h4>
		<br>
		<!-- chia sẻ -->
		<div>
			<span>Chia sẻ sản phẩm này: </span>
			<ul class="nav">
				<li><a href="//www.facebook.com/sharer.php?u=http://localhost:8080/ShopThoiTrang_PHP/product-detail.php?action=&id=<?php echo $_POST['hidden_id'];?>#" data-toggle="tooltip" title="Facebook"><i class='fab fa-facebook-f'></i></a></li>
				<li><a href="//twitter.com/share?text=<?php echo $_POST['hidden_name']; ?>;url=http://localhost:8080/ShopThoiTrang_PHP/product-detail.php?action=&id=<?php echo $_POST['hidden_id'];?>#" data-toggle="tooltip" title="Twitter"><i class='fab fa-google-wallet'></i></a></li>
				<li><a href="//plus.google.com/share?url=http://localhost:8080/ShopThoiTrang_PHP/product-detail.php?action=&id=<?php echo $_POST['hidden_id'];?>#" data-toggle="tooltip" title="Google+"><i class='fab fa-google-plus-g'></i></a></li>
				<li><a href="//pinterest.com/pin/create/button/?url=http://localhost:8080/ShopThoiTrang_PHP/product-detail.php?action=&id=<?php echo $_POST['hidden_id'];?>#" data-toggle="tooltip" title="Pinterest"><i class='fab fa-pinterest'></i></a></li>
			</ul>
		</div>
		<!-- chia sẻ -->
	</div>
	
</div>

<br>
<h3 style="text-align: center;">Sản phẩm liên quan</h3>	
<hr/>
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
<!-- Footer -->
<?php
	require("include/footer.php");
?>
<!-- //footer -->
	
</body>
</html>