<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<?php
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","shop");

    $sql = "SELECT * From admin where username ='$username' and email = '$email' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo'<div class="alert alert-dark">
                <strong>Thất bại!</strong> Email ! Tên đăng nhập không tồn tại.
            </div>';
            echo $sql;
    }
    else
    {
        $sql = "UPDATE admin SET `password`='$password' WHERE `username`='$username' and `email`='$email' ";
        $result = mysqli_query($conn,$sql);
        //echo "<script>window.location = 'login.php'</script>";
        echo'<div class="alert alert-dark">
                <strong>Thất bại!</strong> thành công.
            </div>';
            echo $sql;
    }
    $conn ->close();
?>

