<?php
    include_once '../classes/nhasanxuat.php';
    $nhasanxuat = new nhasanxuat();
    if($_SERVER = $_POST['TenNSX']);
    {
        $TenNSX = $_POST['TenNSX'];
        $DiaChiNSX = $_POST['DiaChiNSX'];
        $SDTNSX = $_POST['SDTNSX'];
        $EmailNSX = $_POST['EmailNSX'];
        $insertNSX = $nhasanxuat->insert_nhasanxuat($TenNSX, $DiaChiNSX, $SDTNSX,$EmailNSX);
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
        <title>Quản lý nhà sản xuất</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Staff Camper Store</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><strong></strong></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="?action=logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản lý nhà sản xuất</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý nhà sản xuất</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="nhasanxuat.php" method="post">
                                    <table >
                                        <tr>
                                            <td width="167">Tên nhà sản xuất</td>
                                                <td width="423">
                                                <input type="text" name="TenNSX" id="TenNSX" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td><input type="text" name="DiaChiNSX" id="DiaChiNSX"/></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td><input type="number" name="SDTNSX" id="SDTNSX"/> </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" name="EmailNSX" id="EmailNSX"/> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="btn btn-success" type="submit" name="submit" value="Save">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php if(isset($insertNSX))
                        {
                            echo $insertNSX;
                        }?>
                        <!-- Danh sách loại sản phẩm-->
                    <div class="block">
                        <h2>Danh sách nhà sản xuất</h2>
                        <form>
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã</th>
                                            <th>Tên nhà sản xuất</th>
                                            <th>Địa chỉ</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $show = $nhasanxuat->show_nhasanxuat();
                                        if($show)
                                        {
                                            $i = 0;
                                            while ($result = $show -> fetch_assoc())
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['MaNSX']?></td>
                                            <td><?php echo $result['TenNSX']?></td>
                                            <td><?php echo $result['DiaChiNSX']?></td>
                                            <td><?php echo $result['SDTNSX']?></td>
                                            <td><?php echo $result['EmailNSX']?></td>
                                            <td><a class="btn btn-success" href="nhasanxuatedit.php?NSXid=<?php echo $result['MaNSX']?>">Sửa</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thệc không ???')">Xóa</a></td>
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </form>
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
