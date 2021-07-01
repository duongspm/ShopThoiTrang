<?php
    include_once '../classes/nhasanxuat.php';
    $nhasanxuat = new nhasanxuat();
    if(!isset($_GET['NSXid']) || $_GET('NSXid')==NULL)
    {
        echo "<script>window.location = 'nhasanxuat.php'</script>";
    }else
    {
        $id = $_GET['NSXid'];
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
        <title>Sửa nhà sản xuất</title>
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
                        <h1 class="mt-4">Sửa nhà sản xuất</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Sửa nhà sản xuất</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <!-- <?php
                                $getNSX = $nhasanxuat->getNSXbyid($id);
                                if($getNSX)
                                {
                                    while($result = $getNSX->fetch_assoc())
                                    {
                                     
                            ?> -->
                                <form action="nhasanxuat.php" method="post">
                                    <table >
                                        <tr>
                                            <td width="167">Tên nhà sản xuất</td>
                                                <td width="423">
                                                <input value="<?php echo $result['TenNSX']?>" type="text" name="TenNSX" id="TenNSX" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td><input value="<?php echo $result['DiaChiNSX']?>" type="text" name="DiaChiNSX" id="DiaChiNSX"/></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td><input value="<?php echo $result['SDTNSX']?>" type="number" name="SDTNSX" id="SDTNSX"/> </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input value="<?php echo $result['EmailNSX']?>" type="email" name="EmailNSX" id="EmailNSX"/> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="btn btn-success" type="submit" name="submit" value="Save">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                    
                                    }
                                }
                            ?>
                            </div>
                        </div>
                        <?php if(isset($insertNSX))
                        {
                            echo $insertNSX;
                        }?>
                        
                    </div>
                </main>
            </div>

        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
