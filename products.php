
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
<?php
    $trang=0;
    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    $laysp=phan_trang("*","sanpham","",6,$trang,"");

    $truyvan_laysp=$laysp;

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
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="" role="tab"
                    aria-controls="pills-home" aria-selected="true">Tất cả sản phẩm</a>
            </li>
            <?php
                global $conn;
                $layLoaiSP="SELECT * FROM loaisanpham";
                $truyvan_layLoaiSP=mysqli_query($conn,$layLoaiSP);
                while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                {
            ?>
            <li id= "value" class="nav-item">
                <a href="DanhMucSanPham.php?loaisp=<?php echo $cot["MaLoai"] ?>" role="tab"
                    aria-controls="pills-profile" aria-selected="false"><?php echo $cot['TenLoaiSP']?></a>
                </li>
            <?php
                }
            ?>
        </ul>
        
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
                    <h3><?php echo $cot["TenSP"] ?></h3>
                    <p><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["GiaSP"]); ?> VNĐ</span></a></p>
                <div>
                    <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
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
        <!--mới-->
    </div>
    <script>
        $(document).ready(function(){
            <?php
                echo  "$('.divtrang_".$trang."').addClass('divtrangactive')";
            ?>
        });
    </script>
   <!-- Footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->
</body>
</html>