<?php
    include 'include/header.php';
?>
<?php
    include 'include/head.php';
?>
<?php
    include 'include/nav.php';
?>
<!--Style login -->
<link rel="stylesheet" type="text/css" href="css/login.css" />
    <!--Style login -->
<!DOCTYPE html>
<html>
<head>
    <title>Login | Đăng Nhập</title>
</head>
<div class="logins">
                <div class="logins_title">
                    <h2>Đăng nhập</h2>
                    <p>Nếu bạn đã có tài khoản, đăng nhập tại đây</p>
                </div>
                <div class="logins_main">
                    <div class="login_col">
                        <div class="login_main">
                            <label>Tên đăng nhập</label>
                            <p></p>
                            <input autofocus="" class ="input" id="email" type="text" placeholder="Nhập tên đăng của bạn">
                        </div>
                    </div>
                    <div class="login_col">
                        <div class="login_main">
                            <label>Mật khẩu</label>
                            <p></p>
                            <input id="password" type="password" placeholder="Nhập mật khẩu của bạn">
                        </div>
                    </div>
                    <div class="login_col">
                        <div class="login_main">
                            <div class="login_main_bottom">
                                <p>Bạn quên mật khẩu? Lấy lại mật khẩu</p>
                                <a id="open_popup_send_email" href="#">Tại đây</a>
                            </div>
                        </div>
                    </div>
                    <div class="login_col">
                        <div class="login_main">
                            <div class="login_main_bottom">
                                <button type="submit" id="login_submit" class="button">
                                    <span>Đăng Nhập</span>
                                </button>
                                <span>Bạn chưa có tài khoản?</span>
                                <a href="register.php">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="login_col">
                        <div class="login_main">
                            <div class="login_main_fire">
                                <a id="login_via_fb" href="#" class="login_fire">
                                    <i class='fab fa-facebook-square' style='font-size:36px'></i>   
                                    <span>Facebook</span>
                                </a>
                                <a id="login_via_gg" href="#" class="login_fire">
                                    <i class='fab fa-google' style='font-size:36px'></i>
                                    <span>Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<body>


<!-- Footer -->
	<!-- footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->
</body>
</html>