<?php
include("DataProvider.php");
session_start();

for ($i = 0; $i < count($_SESSION['id_them_vao_gio']); $i++) {
    $masp = $_SESSION['id_them_vao_gio'][$i];
    $sql = DataProvider::ExecuteQuery("select SoLuongSP from sanpham where masp=" . $masp);

    $sl = $_SESSION['sl_them_vao_gio'][$i];
   
    
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_array($sql);
        $tonkho= $row['SoLuongSP'];
        if ($sl > $tonkho) {
            echo '<script type="text/javascript">
                alert("Vui lòng chọn ít hơn số lượng tồn kho!!!");
                    window.location = "../GioHang.php"
                </script>';
            exit;

        } else if ($sl > 0 && $sl <= $tonkho) {
            header("Location: ../DatHang.php");
            exit;
        }
    }
}
