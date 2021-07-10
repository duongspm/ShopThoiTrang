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

    $tendangnhap=$_POST["tendangnhap"];
    $matkhau=$_POST["matkhau"];
    $tranghientai=$_POST["tranghientai"];

    $ktTonTai="SELECT * FROM khachhang WHERE TenDangNhapKH='".$tendangnhap."' and MatKhauKH='".$matkhau."'";
    $truyvanktTonTai=mysqli_query($conn,$ktTonTai);
    if(mysqli_num_rows($truyvanktTonTai)>0) {
        echo "<script>alert('Đăng nhập thành công')</script>";
        
        $result = mysqli_fetch_array($truyvanktTonTai);
        $_SESSION["MaKH"]=$result['MaKH'];
    }
    else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')location='index.php';</script>";
    }

?>