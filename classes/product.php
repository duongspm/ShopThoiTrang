<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database(); //gọi lại class database và truyền vào biến db
            $this->fm = new Format(); //class format trong folder helpers
        }
        public function insert_product($data, $files)
        {

            //link là cái phần kết nối csdl
            $TenSP = mysqli_real_escape_string($this->db->link, $data['TenSP']);
            $GiaSP = mysqli_real_escape_string($this->db->link, $data['GiaSP']);
            $SoLuongSP = mysqli_real_escape_string($this->db->link, $data['SoLuongSP']);
            //chua dung toi image
            $Size = mysqli_real_escape_string($this->db->link, $data['Size']);
            $MauSacSP = mysqli_real_escape_string($this->db->link, $data['MauSacSP']);
            $MaLoai = mysqli_real_escape_string($this->db->link, $data['MaLoai']);
            $MaNSX = mysqli_real_escape_string($this->db->link, $data['MaNSX']);
            $MoTaSP = mysqli_real_escape_string($this->db->link, $data['MoTaSP']);
            //$HinhAnhSP = mysqli_real_escape_string($this->db->link, $data['image']);//
            
            //xu ly them hinh anh
            //kiem tra hinh anh va lay hinh anh cho vao fl
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "products/".$unique_image;

            if(empty($TenSP) || empty($GiaSP) || empty($SoLuongSP) || empty($Size)|| empty($MauSacSP)|| empty($MoTaSP))
            {
                $alert = "<div class='alert alert-dark'>
                                <strong>Thất bại!</strong> Thêm thất bại ! Nhớ nhập đầy đủ thông tin sản phẩm nha.
                            </div>";
                return $alert;
            }
            else
            {
                $sql = "SELECT * From sanpham where TenSP ='$TenSP' ";
                $result = $this->db->insert($sql);

                if($result)
                {
                    $alert = "<div class='alert alert-dark'>
                                    <strong>Thất bại!</strong> Thêm thất bại ! Tên sản phẩm đã tồn tại.
                                </div>";
                    return $alert;
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO `sanpham`(`TenSP`, `GiaSP`, `SoLuongSP`, `HinhAnhSP`, `Size`, `MauSacSP`, `MaLoai`, `MaNSX`, `MoTaSP`) 
                        VALUES ('$TenSP','$GiaSP','$SoLuongSP','$unique_image','$Size','$MauSacSP','$MaLoai','$MaNSX','$MoTaSP')"; //limit 1 là lấy ra 1 cái đúng thôi
                    $result = $this->db->insert($query);
                    $alert = "<div class='alert alert-success'>
                                    <strong>Thêm thành công!</strong> Thêm dữ liệu sản phẩm thành công.
                                </div>";
                    return $alert;
                }
            }
        }
        public function show_product()
        {
            $query = "SELECT * FROM sanpham ORDER BY MaSP DESC"; //limit 1 là lấy ra 1 cái đúng thôi
            $result = $this->db->select($query);
            return $result;
        }
        // public function getcatbyId($id)
        // {
        //     $query = "SELECT * FROM loaisanpham where MaLoai = '$id' ";
        //     $result = $this->db->select($query);
        //     return $result;
        // }
        // public function update_category($catName, $catDes, $catImage,$id)
        // {
        //     $catName = $this->fm->validation($catName);//kiểm tra có ký tự đặc biệt hay khoản trắng có hợp lệ không
        //     $catDes = $this->fm->validation($catDes);
        //     $catImage = $this->fm->validation($catImage);

        //     //link là cái phần kết nối csdl
        //     $catName = mysqli_real_escape_string($this->db->link, $catName);
        //     $catDes = mysqli_real_escape_string($this->db->link, $catDes);
        //     $catImage = mysqli_real_escape_string($this->db->link, $catImage);
        //     $id = mysqli_real_escape_string($this->db->link, $id);

        //     if(empty($catName) || empty($catDes) || empty($catImage))
        //     {
        //         $alert = "<div class='alert alert-dark'>
        //                     <strong>Thất bại!</strong> Thêm thất bại !Nhập đầy đủ thông tin.
        //                 </div>";
        //         return $alert;
        //     }
        //     else
        //     {
               
        //          $query = "UPDATE loaisanpham set TenLoaiSP = '$catName',HinhAnhLoaiSP = '$catImage',ChuThichLoaiSP = '$catDes' WHERE MaLoai = '$id'"; //limit 1 là lấy ra 1 cái đúng thôi
        //             $result = $this->db->update($query);
        //         if($result>0)
        //         {
        //             $alert = "<div class='alert alert-success'>
        //                             <strong>Thêm thành công!</strong> Sửa dữ liệu thành công.
        //                         </div>";
        //             return $alert;
        //         }else{
        //             $alert = "<div class='alert alert-dark'>
        //                             <strong>Thất bại!</strong> Sửa thất bại !.
        //                         </div>";
        //             return $alert;
                    
        //         }
        //     }

        // }
        // public function del_nhasanxuat($id)
        // {
        //     $query = "DELETE FROM loaisanpham where MaLoai ='$id'";
        //     $result = $this -> db ->delete($query);
        //     if($result)
        //     {
        //         $alert = "<div class='alert alert-success'>
        //                             <strong>Xóa thành công!</strong> Xóa dữ liệu thành công.
        //                         </div>";
        //             return $alert;
        //     }else{
        //         $alert = "<div class='alert alert-dark'>
        //                         <strong>Xóa bại!</strong> Xóa dữ liệu thất bại !.
        //                     </div>";
        //         return $alert;
                
        //     }
        // }
    }
?>