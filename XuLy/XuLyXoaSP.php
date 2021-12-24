<?php
    $MaSP=$_GET['id'];
    include("DataProvider.php");
    $result=DataProvider::ExecuteQuery("Delete From SanPham Where MaSP =" . $MaSP);
    header("location: /WebCayCanh/QuanTri.php");
?>