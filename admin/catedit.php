<?php
    include_once '../classes/category.php';
    $cat = new category();
    if(!isset($_GET['catid']) || $_GET('catid')==NULL)
    {
        echo "<script>window.location = 'catadd.php'</script>";
    }else
    {
        $id = $_GET['catid'];
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
        <title>Danh mục loại sản phẩm</title>
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
                        <h1 class="mt-4">Sửa loại sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Sửa loại sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                $get_cat_name = $cat->getcatbyId($id);
                                if($get_cat_name)
                                {
                                    while($result = $get_cat_name->fetch_assoc())
                                    {
                                     
                            ?>
                                <form action="catadd.php" method="post" enctype="multipart/form-data">
                                    <table >
                                        <tr>
                                            <td width="167">Tên loại sản phẩm</td>
                                                <td width="423">
                                                <input value="<?php echo $result['TenLoaiSP']?>" type="text" name="catName" id="catName" class="catName" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hình ảnh loại sản phẩm</td>
                                            <td><input value="<?php echo $result['HinhAnhLoaiSP']?>" type="file" name="catImage" id="catImage" class="catImage"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả loại sản phẩm</td>
                                            <td><input value="<?php echo $result['ChuThichLoaiSP']?>" type="text" name="catDes" id="catDes" class="catDes"/> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" value="Thêm mới" class="btn btn-success button_insert ">
                                                <!-- <input  type="submit" value="Thêm" class="btn btn-block btn-info"> -->
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
                        <div class="result"></div>
                        <?php if(isset($insertCat))
                        {
                            echo $insertCat;
                        }?>
                        <!-- Danh sách loại sản phẩm-->
                    <!-- <div class="block">
                    <div class="block">
                        <h2>Danh sách loại sản phẩm</h2>
                        <form enctype="multipart/form-data">
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $show_cat = $cat->show_category();
                                        if($show_cat)
                                        {
                                            $i = 0;
                                            while ($result = $show_cat -> fetch_assoc())
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['MaLoai']?></td>
                                            <td><?php echo $result['TenLoaiSP']?></td>
                                            <td><?php echo $result['ChuThichLoaiSP']?></td>
                                            <td><img src="images/<?php echo $result['HinhAnhLoaiSP']?>"></td>  
                                            <td><a href="catedit.php?catid=<?php echo $result['MaLoai']?>" class="btn btn-success">Sửa</a></td>
                                            <td><a href="?catid=<?php echo $result['MaLoai']?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thệc không ???')">Xóa</a></td>
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div> -->
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
