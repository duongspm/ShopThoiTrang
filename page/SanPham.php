<?php
    include("../layout/header.php");
?>

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
                        while($cot=mysqli_fetch_array($truyvan_laysp))
                        {
                            $i++;
                    ?>
				    <div class="product-one">
                        <div class="col-md-4 product-left single-left">
                            <div >
                                <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>" >  <!-- link chi tiet san pham -->
                                    <img height="250" src="../admin/products/<?php echo $cot["Anh"] ?>" alt="" />
                                    <div class="mask mask1">
                                        <span>Xem chi tiết</span>
                                    </div>
                                </a>

                                <h4><?php echo $cot["TenSanPham"] ?></h4>
                                <p style="background-color: #57C5A0"><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>
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
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--end-product-->
<script>
    $(document).ready(function(){
        <?php
           echo  "$('.divtrang_".$trang."').addClass('divtrangactive')";
        ?>
    });
</script>

<?php
    include_once "../include/footer.php";
?>

