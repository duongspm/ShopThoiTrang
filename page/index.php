
<?php
    include("../layout/header.php");
    // include_once "../layout/header.php";
    global $conn;

    $laySPcao1="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 0,1";
    $truyvan_laySPcao1=mysqli_query($conn,$laySPcao1);
    $cot1=mysqli_fetch_array($truyvan_laySPcao1);

    $laySPcao2="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 1,1";
    $truyvan_laySPcao2=mysqli_query($conn,$laySPcao2);
    $cot2=mysqli_fetch_array($truyvan_laySPcao2);

    $laySP="SELECT * FROM sanpham ORDER BY SoLuong DESC";
    $truyvan_laySP=mysqli_query($conn,$laySP);

?>
<?php include_once "../include/slider.php";?>
<!--Slider-Starts-Here-->
<!--End-slider-script-->
<!--start-shoes-->
<?php
    $trang=0;
    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];
    $laysp=phan_trang("*","sanpham","",6,$trang,"");
    $truyvan_laysp=$laysp;
?>
<div class="product">
		<div class="container">
			<div class="product-main">
                <!--  phan danh sach san pham -->
                <div class="col-md-9 p-left">
            <div class="clearfix"> </div>
                <?php
                $i=0;
                while($cot=mysqli_fetch_array($truyvan_laySP))
                    {
                        $i++;
                    ?>
                <div class="product-one">
                    <div class="col-md-4 product-left single-left">
                        <div>
                            <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>">
                                <img height="250" src="../admin/products/<?php echo $cot["Anh"]; ?>" alt="" />
                                <div class="mask mask1">
                                    <span>Xem chi tiết</span>
                                </div>
                            </a>
                        
                                <h3><?php echo $cot["TenSanPham"]; ?></h3>
                                <p style="background-color: #57C5A0"><a class="item_add" href="#"><i></i> <span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>
                        </div>
                    </div>
                </div>
                    <?php
                        if($i%4==0)
                        { 
                    ?>
                    <div class="clearfix"></div>
                    <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "../include/footer.php";
?>
