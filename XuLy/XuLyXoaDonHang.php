<?php
    $MaDH=$_GET['id'];
    include("DataProvider.php");
    $result=DataProvider::ExecuteQuery("Delete From donhang Where MaDH =" . $MaDH);
    header("location: /WebCayCanh/QuanTriDonHang.php");
?>