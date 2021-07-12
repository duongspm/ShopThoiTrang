<?php
    $hostName = 'MYSQL5047.site4now.net';
// khai báo biến username
$userName = 'a77512_tranvan';
//khai báo biến password
$passWord = 'shop_nhom3';
// khai báo biến databaseName
$databaseName = 'db_a77512_tranvan';
$conn = mysqli_connect($hostName, $userName, $passWord , $databaseName) or die ('Không thể kết nối tới database');
?>
