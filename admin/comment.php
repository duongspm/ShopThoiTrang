<?php
    include "../admin/include/header_admin.php";
    if(isset($_GET["MaComment"]))
    {
        global $conn;
        $xoaDuLieu="DELETE FROM comment  WHERE MaComment ='".$_GET["MaComment"]."'";
        if(mysqli_query($conn,$xoaDuLieu))
        {
            echo "<script>alert('Xóa bình luận thành công !')</script>";
        }
        else
        {
            echo "<script>alert('Đã xảy ra lỗi !')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bình Luận Của Khách Hàng</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include 'include/navbaradmin.php'?>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Bình Luận Của Khách Hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Bình Luận Của Khách Hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <!-- Danh sách loại sản phẩm-->
                        </div>
                        <div  class="container-fluid px-4">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Thời gian bình luận</th>
                                    <th>Nội dung</th>
                                    <th></th>
                                </tr>
                                <?php
                                    $layDuLieu="SELECT * FROM comment
                                            INNER JOIN khachhang ON comment.MaKH=khachhang.MaKH
                                            INNER JOIN sanpham ON comment.MaSP=sanpham.MaSP
                                            ";
                                    global $conn;
                                    $truyvan_layDuLieu=mysqli_query($conn,$layDuLieu);
                                while($cot=mysqli_fetch_array($truyvan_layDuLieu))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $cot["HoTenKH"];?></td>
                                        <td><?php echo $cot["TenSP"];?></td>
                                        <td><?php echo date("d/m/Y",strtotime($cot["ThoiGian"]));?></td>

                                        <td>
                                            <?php
                                                if(strlen($cot["NoiDung"]) < 20 )
                                                    echo $cot["NoiDung"];
                                                else
                                                    echo substr($cot["NoiDung"],0,20)."...";
                                            ?>
                                        </td>
                                        <td>
                                            <a href="comment_xem.php?MaComment=<?php echo $cot["MaComment"]; ?>" class="btn btn-success">Xem</a>
                                            <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaComment=<?php echo $cot["MaComment"]; ?>" class="XoaDuLieu btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </table>
                            <div class="divtrang"></div>
                        </div>
                    </div>
                    </div>
                </main>
                <script>
                    $(document).ready(function () {
                        <?php
                        echo  "$('.divtrang_".$trang."').addClass('divtrangactive');";
                        ?>

                        $('.XoaDuLieu').click(function(){
                            if(!confirm("Bạn có thực muốn xóa !"))
                                return false;
                        });

                        $('#btn-timkiem').click(function (){
                            location="BinhLuan.php?noidung="+$('#txt-timkiem').val();
                        });
                    });
                </script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
   
    </body>
</html>
