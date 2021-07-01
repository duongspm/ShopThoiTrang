<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản lý đơn hàng</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">Quản lý đơn hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                        </ol>
                     
                        <!-- Danh sách loại sản phẩm-->
                    <div class="block">
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th>Trạng thái</th>
                                            <th>Hình ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-success">Sửa</button></td>
                                            <td><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thệc không ???')">Xóa</button></td>
                                        </tr>
                                    </tbody>
                        </table>
                    </div>
                    <!-- Danh sách loại sản phẩm-->
                    </div>

                    
                </main>
            </div>

        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
