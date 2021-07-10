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
if(isset($_SESSION["giohang"])) // kiem tra ton tai gio hang
{
    foreach($_SESSION["giohang"] as $cotGH) {
        if($cotGH["MaSP"]!=$_POST["masanpham"])
        {
            $giohangdaco[]=array("masp"=>$cotGH["MaSP"],"hinhsp"=>$cotGH["HinhAnhSP"],"tensp"=>$cotGH["TenSP"],"soluong"=>$cotGH["SoLuong"],"dongia"=>$cotGH["DonGia"]);
        }
    }
    $_SESSION["giohang"]=$giohangdaco;
}

if(count($_SESSION["giohang"])==0)
{
    unset($_SESSION["giohang"]);
    echo "<script>location='products.php';</script>";
}
else
{
?>


<ul class="unit">
    <li><span></span></li>
    <li><span>Tên sản phẩm</span></li>
    <li><span>Số lượng</span></li>
    <li><span>Đơn giá</span></li>
    <li><span>Thành tiền</span></li>
    <li> </li>
    <div class="clearfix"> </div>
</ul>
<?php
foreach($_SESSION["giohang"] as $cotGH) {
    ?>
    <ul class="cart-header">
        <div class="close1" onclick="XoaGioHang(<?php echo $cotGH["masp"] ?>)"></div>
        <li class="ring-in"><a href="ChiTietSanPham.php?MaSP=<?php echo $cotGH["masp"]; ?>"><img width="100"
                                                                                                 src="../images/HinhSP/<?php echo $cotGH["HinhAnhSP"]; ?>"
                                                                                                 class="img-responsive"
                                                                                                 alt=""></a>
        </li>
        <li><span><?php echo $cotGH["TenSP"]; ?></span></li>
        <li>
                            <span>
                                 <select id="soluongdat"
                                         onchange="SuaGioHang(<?php echo $cotGH["masp"]; ?>,$(this).val());">
                                     <?php for ($i = 1; $i < 7; $i++) {
                                         if ($cotGH["SoLuong"] == $i) {
                                             ?>
                                             <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                         <?php } else { ?>
                                             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                         <?php
                                         }
                                     }
                                     ?>

                                 </select>
                            </span>
        </li>
        <li><span><?php echo DinhDangTien($cotGH["DonGia"]); ?></span></li>
        <li><span><?php echo DinhDangTien($cotGH["DonGia"] * $cotGH["SoLuong"]); ?></span></li>
        <div class="clearfix"></div>
    </ul>
<?php
}
}
?>
