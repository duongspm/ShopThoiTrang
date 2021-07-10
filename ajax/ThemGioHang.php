<?php 
session_start();

function DinhDangTien($dongia) //1000000
{
    $sResult = $dongia;
    for ( $i = 3; $i < strlen($sResult); $i += 4)
    {
        $sSau = substr($sResult,strlen($sResult) - $i); // 000.000
        $sDau = substr($sResult,0, strlen($sResult) - $i); // 1
        $sResult = $sDau . "." . $sSau; // 1.000.000
    }
    return $sResult;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");

$laySanPham="SELECT * FROM sanpham WHERE MaSP='".$_POST["MaSP"]."'";
$truyvanlaySanPham=mysqli_query($conn,$laySanPham);
$cot=mysqli_fetch_array($truyvanlaySanPham);

$giohangmoi=array(array("masp"=>$cot["MaSP"],"hinhsp"=>$cot["HinhAnhSP"],"tensp"=>$cot["TenSP"],"soluong"=>$_POST["soluong"],"dongia"=>$cot["DonGia"])); // khoi tao gio hang moi

if(isset($_SESSION["giohang"])) // kiem tra gio hang ton tai
{
    $themspmoi=false;

    foreach($_SESSION["giohang"] as $cotGH)
    {
        if($cotGH["MaSP"]==$_POST["masanpham"])
        {
           $soluongdat = $cotGH["SoLuong"] + $_POST["soluong"];
            if($soluongdat>6)
            {
                $giohangdaco[]=array("masp"=>$cotGH["MaSP"],"hinhsp"=>$cotGH["HinhAnhSP"],"tensp"=>$cotGH["TenSP"],"soluong"=>$cotGH["SoLuong"],"dongia"=>$cotGH["GiaSP"]);
                echo "<script>alert('Số lượng đặt vượt quá giới hạn cho phép (ít hơn 6 sản phẩm thôi ạ)');</script>";
            }
            else
            {
                $giohangdaco[]=array("masp"=>$cotGH["MaSP"],"hinhsp"=>$cotGH["HinhAnhSP"],"tensp"=>$cotGH["TenSP"],"soluong"=>$soluongdat,"dongia"=>$cotGH["GiaSP"]);
            }
            $themspmoi=true;
        }
        else
        {
            $giohangdaco[]=array("masp"=>$cotGH["MaSP"],"hinhsp"=>$cotGH["HinhAnhSP"],"tensp"=>$cotGH["TenSP"],"soluong"=>$cotGH["SoLuong"],"dongia"=>$cotGH["GiaSP"]);
        }
    }

    if($themspmoi==false)
    {
        $_SESSION["giohang"]=array_merge($giohangdaco,$giohangmoi);
    }
    else
    {
        $_SESSION["giohang"]=$giohangdaco;
    }

}
else
{
    $_SESSION["giohang"]=$giohangmoi;
}

$tongsp=0;
$tongtien=0;
foreach($_SESSION["giohang"] as $cotGH)
{
    $tongsp++;
    $tongtien+=$cotGH["DonGia"]*$cotGH["SoLuong"];
}

?>



<div class="cart box_1">
    <a href="GioHang.php">
        <h3> <div class="total">
                <span > <?php echo DinhDangTien($tongtien); ?> VNĐ</span> (<span id="simpleCart_quantity" > <?php echo $tongsp; ?> </span> SP)</div>
            <img src="../images/cart-1.png" alt="" />
    </a>
    <p><a href="product.php?moiGH=0"  class="simpleCart_empty">Làm mới</a></p>
    <div class="clearfix"> </div>
</div>