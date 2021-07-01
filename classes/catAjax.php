<?php
    $conn = mysqli_connect("localhost","root","","shop") or die ("Connect fail");

    $output ='';
    $sql_select = mysqli_query($conn,"SELECT * FROM loaisanpham ORDER BY MaLoai Desc");
    //nối chuỗi
    $output .='
        <div class ="table table-responsive">
            <table class ="table table-bordered">
                <tr>
                    <td>STT</td>
                    <td>Tên loại sản phẩm</td>
                    <td>Mô tả</td>
                    <td>Ảnh Bìa sách</td>
                </tr>
    ';
    if(mysqli_num_rows($sql_select)>0){
        while($rows = mysqli_fetch_array($sql_select))
        {
            $output .='
                <tr>
                    <td>'.$rows['MaLoai'].'</td>
                    <td>'.$rows['TenLoaiSP'].'</td>
                    <td>'.$rows['ChuThichLoaiSP'].'</td>
                    <td>'.$rows['HinhAnhLoaiSP'].'</td>
                    <td><button data-id_sua='.$rows['MaLoai'].' class="btn btn-sm btn-info update_data" name="update_data">Sửa</button></td>
                    <td><button data-id_xoa='.$rows['MaLoai'].' class="btn btn-sm btn-danger del_data" name="delete_data">Xóa</button></td>
                </tr>
            ';
        }
    }else{
        $output .='
            <tr>
                <td colspan="5">Dự liệu rỗng</td>
            </tr>
        ';
    }

    $output .='
        </table>
    </div>
    ';
    echo $output;

    function excuteResult($sql)
    {
        
    }
?>