<?php
    $MaTK=$_GET['id'];
    include("DataProvider.php");
    $result=DataProvider::ExecuteQuery("Delete From BinhLuanSP Where MaTK =" . $MaTK);
    $result=DataProvider::ExecuteQuery("Delete From BinhLuanBlog Where MaTK =" . $MaTK);
    $result=DataProvider::ExecuteQuery("Delete From Blog Where MaTK =" . $MaTK);
    $result=DataProvider::ExecuteQuery("Delete From TaiKhoan Where MaTK =" . $MaTK);
    header("location: /WebCayCanh/QuanTriTaiKhoan.php");
?>