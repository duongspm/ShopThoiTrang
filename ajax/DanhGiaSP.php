<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");

if($_POST["MaKH"]=="")
{
    echo "Bạn phải đăng nhập mới có thể đánh giá";
}
else
{
    $layDanhGia="SELECT * FROM danhgia WHERE MaSP='".$_POST["MaSP"]."' and MaKH='".$_POST["MaKH"]."'";
    $truyvanlayDanhGia=mysqli_query($conn,$layDanhGia);
    if(mysqli_num_rows($truyvanlayDanhGia)>0)
    {
        echo "Bạn đã đánh giá sản phẩm này";
    }
    else
    {
        $themDanhGia="INSERT INTO danhgia VALUES ('".$_POST["MaSP"]."','".$_POST["MaKH"]."','".$_POST["NoiDung"]."')";
        if(mysqli_query($conn,$themDanhGia))
            echo "Đánh giá thành công";
        else
            echo "Thất bại";
    }
}

?>