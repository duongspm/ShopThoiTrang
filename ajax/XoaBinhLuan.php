<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");


$xoaBinhLuan="DELETE FROM comment WHERE MaComment='".$_POST["mabinhluan"]."'";

    if(mysqli_query($conn,$xoaBinhLuan))
        echo "Xóa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>