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

if(isset($_SESSION["MaKH"]))
    echo "<script>location='products.php';</script>";
?>
<!--Style register -->
<link rel="stylesheet" type="text/css" href="css/register.css" />
    <!--Style register -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Đăng ký</title>
</head>
<body>
<script>
        $(document).ready(function()
        {
            $('.dangKy').click(function(e)
                {
                    e.preventDefault(); 
                    var $fullName = $('.fullName').val();
                    var $address = $('.address').val();
                    var $phoneNumber = $('.phoneNumber').val();
                    var $email = $('.email').val();
                    var $tendangnhap = $('.tendangnhap').val();
                    var $password = $('.password').val();
                    var $password_again = $('.password_again').val();
                    var $ngaysinh = $('.ngaysinh').val();
                    var $gender = $('.gender').val();
                    

                    // Kiểm tra đã nhập chưa
                    if ($fullName == '') {
                         alert('Vui lòng nhập họ và tên');
                         return false;
                    }
                    
                    // Kiểm tra đã nhập chưa
                    if ($address == '') {
                        alert('Vui lòng nhập địa chỉ a');
                        return false;
                    }

                    // // Kiểm tra đã nhập chưa
                    // if (isNaN($phoneNumber)) {
                    //     alert('Vui lòng nhập số, với độ dài là 10');
                    //     return false;
                    // }
                    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                    var $phoneNumber = $('.phoneNumber').val();
                    if (vnf_regex.test($phoneNumber) == false) 
                        {
                            alert('Số điện thoại của bạn không đúng định dạng!');
                            return false;
                        }
                    
                    // Kiểm tra đã nhập chưa
                    if ($email == '') {
                        alert('Vui lòng nhập email');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($tendangnhap == '') {
                        alert('Vui lòng tên đăng nhập');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($password == '') {
                        alert('Vui lòng nhập mặt khẩu');
                        return false;
                    }
                    if ($password != $password_again) {
                        alert('Mặt khẩu không trùng khớp');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($ngaysinh == '') {
                        alert('Vui lòng nhập ngày sinh');
                        return false;
                    }
                    $.ajax
                    ({
                        url: '../../../classes/registerAjax.php',
                        type: 'post', //post và get
                        dataType: 'html',
                        data: {
                            fullName : $fullName,
                            address : $address,
                            phoneNumber : $phoneNumber,
                            email : $email,
                            tendangnhap : $tendangnhap,
                            password : $password,
                            ngaysinh  :$ngaysinh,
                            gender : $gender
                        }
                    }).done(function(ketqua)
                    {
                        $('.result').html(ketqua);
                    });
                });
        });
    </script>
            <div class="registers">
                <div class="registers_title">
                    <h2>Đăng ký</h2>
                    <p>Nếu bạn chưa có tài khoản, điền các thông tin đăng ký tại đây</p>
                </div>
                <div class="registerss_main">
                    <div class="register_col">
                        <div class="register_main">
                            <label>Họ và tên</label>
                            <input autofocus="" name="fullName" class="fullName" type="text" placeholder="Nhập họ và tên của bạn" required="required">
                        </div>
                    </div>
					<div class="register_col">
                        <div class="register_main">
                            <label>Địa chỉ</label>
                            <input class="address" id="address" type="text" placeholder="Nhập địa chỉ của bạn" required="required">
                        </div>
                    </div>
                    <div class="register_col">
                        <div class="register_main">
                            <label>Số điện thoại</label>
                            <input class="phoneNumber"id="phoneNumber" type="tel" placeholder="Nhập số điện thoại của bạn" required="required">
                        </div>
                    </div>
                    <div class="register_col">
                        <div class="register_main">
                            <label>Email</label>
                            <input class="email" id="email" type="email" placeholder="Nhập Email của bạn" required="required">
                        </div>
                    </div>
					<div class="register_col">
                        <div class="register_main">
                            <label>Tên đăng nhập</label>
                            <input class="tendangnhap" id="tendangnhap" type="text" placeholder="Nhập Tên đăng nhập của bạn" required="required">
                        </div>
                    </div>
                    <div class="register_col register_col_50">
                        <div class="register_col">
                            <div class="register_main">
                                <label>Mật khẩu</label>
                                <input class="password" id="password" type="password" placeholder="Nhập mật khẩu của bạn" required="required">
                            </div>
                        </div>
                        <div class="register_col">
                            <div class="register_main">
                                <label>Nhập lại mật khẩu</label>
                                <input class="password_again" id="password_again" type="password" placeholder="Nhập lại mật khẩu của bạn" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="register_col register_col_50">
                        <div class="register_col">
                            <div class="register_main">
                                <label>Ngày sinh</label>
                                <input class="ngaysinh" id="dob" type="date">
                            </div>
                        </div>
                        <div class="register_col">
                            <div class="register_main">
                                <label>Giới tính</label>
                                <div class="genders">
                                    <div class="gender">
                                        <input id="gender_m" type="radio" class="gender" value="m">
                                        <label for="gender_m">
                                            <span class="sp_input"></span>
                                            <span class="sp_lable">Nam</span>
                                        </label>
                                    </div>
                                    <div class="gender">
                                        <div class="gender">
                                            <input id="gender_f" type="radio" class="gender" value="f">
                                            <label for="gender_f">
                                                <span class="sp_input"></span>
                                                <span class="sp_lable">Nữ</span>
                                            </label>
                                        </div>
                                    </div>
									<div class="gender">
                                        <div class="gender">
                                            <input id="gender_k" type="radio" class="gender" value="k">
                                            <label for="gender_k">
                                                <span class="sp_input"></span>
                                                <span class="sp_lable">Khác</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="register_col">
                    <div class="result"></div>
                        <div class="register_main">
                            <div class="register_main_bottom">
                                <button id="registers_submit" class="button dark dangKy">
                                    <span>Đăng ký</span>
                                </button>
                                <span>Bạn đã có tài khoản?</span>
                                <a href="login.php">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Footer -->

	<?php
        require("include/footer.php");
    ?>
<!-- //footer -->

	
</body>
</html>