
<!------ Include the above in your HEAD tag ---------->
<?php
    include 'include/header.php';
?>
<?php
    include 'include/head.php';
?>
<?php
    include 'include/nav.php';
	if(!isset($_GET["MaSP"]))
    header("location: products.php");

	$laySP="SELECT * FROM sanpham WHERE MaSP='".$_GET["MaSP"]."'";
	$truyvan_laySP=mysqli_query($conn,$laySP);
	$cot=mysqli_fetch_array($truyvan_laySP);

	$laySanPhamLQ="SELECT * FROM sanpham WHERE MaLoai='".$cot["MaLoai"]."' and MaSP != '".$_GET["MaSP"]."' order by GiaSP DESC LIMIT 0,6 ";
	$truyvan_laySanPhamLQ=mysqli_query($conn,$laySanPhamLQ);

	$layDG="SELECT * FROM danhgia WHERE MaSP='".$cot["MaSP"]."'";
	$truyvan_layDG=mysqli_query($conn,$layDG);

	$MaKH=""; //$tendangnhap
	$sosao="0";
	if(isset($_SESSION["MaKH"])) {
		$MaKH = $_SESSION["MaKH"];

		$layDG_ND="SELECT * FROM danhgia WHERE MaSP='".$cot["MaSP"]."' and MaKH='".$MaKH."'";
		$truyvanlayDG_ND=mysqli_query($conn,$layDG_ND);

		if(mysqli_num_rows($truyvanlayDG_ND)>0) {
			$cotDG=mysqli_fetch_array($truyvanlayDG_ND);
			$sosao = $cotDG["NoiDung"];
		}
	}
//binhluan - comment
	$layBinhLuan="SELECT *
					FROM comment INNER JOIN khachhang
					ON comment.MaKH=khachhang.MaKH
					WHERE MaSP='".$cot["MaSP"]."' ORDER BY MaComment DESC";

	$truyvan_layBinhLuan=mysqli_query($conn,$layBinhLuan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product detail | Chi Tiết sản phẩm</title>
	<link href="./css/cssNguoiDung/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>		
				
<div class="container">
	<div class="card">
		<div class="container-fliud">
			<div class="wrapper row">
				<div class="preview col-md-6">
					<div class="preview-pic tab-content">
						<div class="tab-pane active" id="pic-1">  
							<img src="admin/products/<?php echo $cot["HinhAnhSP"]; ?>">
						</div>
					</div>
				</div>
				<div class="details col-md-6">
					<br>
					<h3 class="product-title"><?php echo $cot['TenSP'];?></h3>
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
									<?php echo $cot['MoTaSP'] ?>
								</div>
							</div>
						</div>
					</div>
					<br>
					<script defer src="./script/jsNguoiDung/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="./css/cssNguoiDung/flexslider.css" type="text/css" media="screen" />

                        <script>
                            $(window).load(function() {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
					<!-- Hết mô tả -->
					<ul class="saocha" >
						<li class="sao sao1" data-sao="1" onclick="DanhGiaSP(<?php echo $cot["MaSP"]; ?> , '<?php echo $MaKH; ?>' , 1)"></li>
						<li class="sao sao2" data-sao="2" onclick="DanhGiaSP(<?php echo $cot["MaSP"]; ?> , '<?php echo $MaKH; ?>' , 2)"></li>
						<li class="sao sao3" data-sao="3" onclick="DanhGiaSP(<?php echo $cot["MaSP"]; ?> , '<?php echo $MaKH; ?>' , 3)"></li>
						<li class="sao sao4" data-sao="4" onclick="DanhGiaSP(<?php echo $cot["MaSP"]; ?> , '<?php echo $MaKH; ?>' , 4)"></li>
						<li class="sao sao5" data-sao="5" onclick="DanhGiaSP(<?php echo $cot["MaSP"]; ?> , '<?php echo $MaKH; ?>' , 5)"></li>
					</ul>
					( <?php echo mysqli_num_rows($truyvan_layDG) ?> đánh giá )
					<br>
						<h5>Size: <?php echo $cot['Size']?></h5>
					<br>
					<p class="availability">Trạng thái: 
						<span style="color: red;">
							<?php
								if($cot["TrangThai"]==1)
									echo "Nổi bật";
								else echo "Không nổi bật nhưng đẹp";
							?>
						</span>
					</p>
					<br>
					<div class="quantity_box">
						<ul class="product-qty">
							<span>Số lượng mua:</span>
							<select id="soluongdat">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</ul>
					</div>
					<div class="clearfix"> </div>
					<br>
					<h4>Giá bán: <span><?php echo number_format($cot['GiaSP'])?>&#x20AB;</h4>
					<br>
					<div >
						<input class="btn btn-success" type="submit" value="Thêm giỏ hàng" onclick="ThemGioHang(<?php echo $cot["MaSP"]; ?>,$('#soluongdat').val())"/>
					</div>
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
<hr>
<div class="container">
	<div class="card">
		<div class="container-fliud">
			<br>
			<h4>Bình luận sản phẩm:</h4>
			<?php if(isset($_SESSION["MaKH"])) {?>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>?MaSP=<?php echo $cot["MaSP"]; ?>">
					<textarea name="ndbinhluan" id="ndbinhluan" class="form-control" rows="4" placeholder="Nhập nội dung bình luận..."></textarea>
					<div class="single-but item_add" style="text-align: right">
						<input id="btn-binhluan" type="submit" value="Bình luận" >
					</div>
				</form>
			<?php }else { echo "<br><div class='alert alert-warning'>
							<strong>Thông báo!</strong> Bạn cần phải đăng nhập để có để bình luận sản phẩm này.
						</div>";} ?>
			<?php while($cotBL=mysqli_fetch_array($truyvan_layBinhLuan)) {?>
				<hr style="width: 70%">
				<div>
					<span class="bl_ten"><?php echo $cotBL["HoTenKH"]; ?></span>
					<span class="bl_ngay">đã bình luận vào ngày <?php echo date("d/m/Y",strtotime($cotBL["ThoiGian"])); ?></span>

					<?php if(isset($_SESSION["MaKH"]) && $cotBL["MaKH"]==$_SESSION["MaKH"]) {?>
						<span class="glyphicon glyphicon-remove bl_iconxoa" onclick="XoaBinhLuan(<?php echo $cotBL["MaComment"]; ?>,<?php echo $cot["MaSP"]; ?>)"></span>
						<span data-toggle="modal" data-target=".popup-bl" class="glyphicon glyphicon-pencil bl_iconchinh"></span>
					<?php }else{ if(isset($_SESSION["admin"])){  ?>
						<span class="glyphicon glyphicon-remove bl_iconxoa" onclick="XoaBinhLuan(<?php echo $cotBL["MaComment"]; ?>,<?php echo $cot["MaSP"]; ?>)"></span>
					<?php } } ?>

					<input id="bl_mabinhluan" type="hidden" value="<?php echo $cotBL["MaComment"]; ?>">
					<input id="bl_noidung" type="hidden" value="<?php echo $cotBL["NoiDung"]; ?>">
					<div class="bl_noidung">
						<?php echo $cotBL["NoiDung"]; ?>
					</div>
				</div>


			<?php } ?>
		</div>
	</div>
</div>
<hr>
<h3 style="text-align: center;">Sản phẩm liên quan</h3>	
<hr/>
<div class="col-md-9 p-left">
	<div class="clearfix"> </div>
	<?php
		$i=0;
		while($cot=mysqli_fetch_array($truyvan_laySanPhamLQ))
		{
			$i++;
	?>
	<!--Hiển thị sản phẩm-->
	<div class="col-sm-4 col-md-4 prod">
		<a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSP"]; ?>" >
			<img src="admin/products/<?php echo $cot["HinhAnhSP"] ?>" alt="" />
		</a>
		<div class="product-index-info">
			<h3><?php echo $cot["TenSP"] ?></h3>
			<p><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["GiaSP"]); ?> VNĐ</span></a></p>
		<div>
			<input class="btn btn-success" type="submit" value="Thêm giỏ hàng" href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSP"] ?>"/>
		</div>
		</div>
	</div>
	<?php if($i%3==0) {?>
	<div class="clearfix"> </div>
	<?php
			}
		}
	?>
		<div class="divtrang"></div>
</div>
<?php
	global $conn;

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$masp=$_GET["MaSP"];
		$ngaybinhluan=date("Y-m-d");
		$ndbinhluan=$_POST["ndbinhluan"];
		$themBinhLuan="INSERT INTO comment(MaKH,MaSP,NoiDung,ThoiGian) VALUES ('".$MaKH."','".$masp."','".$ndbinhluan."','".$ngaybinhluan."')";
		if(mysqli_query($conn,$themBinhLuan))
		{
			echo "<script>alert('Bình luận sản phẩm thành công. Cám ơn bạn đã góp ý về sản phẩm. Bình luận của bạn sẻ được lưu lại.');window.location='ChiTietSanPham.php?MaSP=".$masp."'</script>";
	
		}
		else{
			echo "<script>alert('Đã có lỗi xảy ra');</script>";
		}

	}
?>

<script>
    $(document).ready(function(){
        for(i=1;i<=<?php echo $sosao; ?>;i++)
        {
            $('.sao'+i).css('background-color','#ffff00');
        }

        $('.sao').mouseenter(function(){
            for(i=1;i<=$(this).attr('data-sao');i++)
            {
                $('.sao'+i).addClass('saohover');
            }

        })

        $('.sao').mouseleave(function(){
            $('.sao').removeClass('saohover');
        })

        $('#btn-binhluan').click(function(){
            if($('#ndbinhluan').val()=="")
            {
                alert("Hãy nhập nội dung bình luận.");
                return false;
            }

        });

        $('.bl_iconchinh').click(function(){
            $('#bl_mabinhluan_cs').val($(this).parent().find("#bl_mabinhluan").val());
            $('#bl_ndbinhluan').val(($(this).parent().find("#bl_noidung").val()));
        });
    })
</script>
<!---Chỉnh sửa Comment-->
<div class="modal fade popup-bl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 50px">
            <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="account-top heading">
                <h3>Chỉnh sửa bình luận</h3>
            </div>
            <div class="address">
                <span>Nội dung</span>
                <input type="hidden" id="bl_mabinhluan_cs" >
                <input id="bl_masanpham" value="<?php echo $_GET["MaSP"]; ?>" type="hidden">

                <textarea  id="bl_ndbinhluan" class="form-control" rows="4" placeholder="Nhập nội dung bình luận..."></textarea>
            </div>

            <div >
                <span style="background-color: red;" id="bl_thongbao"></span> <br>
                <input id="Luu-bl" type="button" value="Save" class="btn btn-success">
            </div>
            <script>
                $(document).ready(function(){
                    $('#Luu-bl').click(function(){
                        bl_ndbinhluan=$('#bl_ndbinhluan').val();

                        loi=0;
                        if(bl_ndbinhluan=="" )
                        {
                            loi++;
                            $('#bl_thongbao').text("Hãy nhập nội dung bình luận");
                        }

                        if(loi!=0)
                        {
                            return false;
                        }
                        else
                        {
                            ChinhSuaBinhLuan($('#bl_mabinhluan_cs').val(),$('#bl_masanpham').val(),$('#bl_ndbinhluan').val(),
							$.ajax(
								{
									url:'../../ajax/ChinhSuaBinhLuan.php',
									type:'post',
									dataType:'html',
									

								}
							)
							);
                        }
                    });
                });
            </script>
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