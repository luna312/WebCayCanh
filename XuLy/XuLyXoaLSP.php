<?php
    $MaLoaiSP=$_GET['id'];
    include("DataProvider.php");
	$result2=DataProvider::ExecuteQuery("Delete from sanpham where MaLoaiSP=" . $MaLoaiSP);
    $result=DataProvider::ExecuteQuery("Delete From loaisanpham Where MaLoaiSP =" . $MaLoaiSP);
    header("location: /WebCayCanh/QuanTriLSP.php");
?>