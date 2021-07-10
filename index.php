<?php 
    // session_start();
    // $connect = mysqli_connect("localhost", "root", "", "testing");
        
    // function add(){					
    //     $connect = mysqli_connect("localhost", "root", "", "testing");
    //     $sql = "INSERT INTO cart(id,name,image,price,quantity)
    //             values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}',1)";
                                
    //     if ($connect->query($sql) === TRUE) {
    //         echo "";
    //     } else {
    //         echo "";
    //     }
                                
    // }

    // if(array_key_exists('add',$_POST)){
    //     add();	
    // }
?>

<?php
    include 'include/header.php';
?>
<?php
    include 'include/head.php';
?>
<?php
    include 'include/nav.php';
    $trang=0;
    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    $laysp=phan_trang("*","sanpham","",6,$trang,"");

    $truyvan_laysp=$laysp;
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
        <!--mới-->
        <div class="col-md-9 p-left">
            <div class="clearfix"> </div>
            <?php
                $i=0;
                while($cot=mysqli_fetch_array($truyvan_laysp))
                {
                    $i++;
            ?>
            <!--Hiển thị sản phẩm-->
            <div class="col-sm-4 col-md-4 prod">
                <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSP"]; ?>" >
                    <img height="250" src="admin/products/<?php echo $cot["HinhAnhSP"] ?>" alt="" />
                </a>
                <div class="product-index-info">
                    <h3 ><?php echo $cot["TenSP"] ?></h3>
                    <p class="price"><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["GiaSP"]); ?> VNĐ</span></a></p>
                </div>
            </div>
            <?php if($i%3==0) {?>

            <div class="clearfix"> </div>
                <br>
            <?php
                    }
                }
            ?>
                <div class="divtrang"></div>
        </div>
        <!--mới-->
	</div>
			
<!-- Footer -->
	<!-- footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->	
</body>
</html>

