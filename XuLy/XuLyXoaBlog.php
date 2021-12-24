<?php
    $MaBlog=$_GET['id'];
    include("DataProvider.php");
    $result=DataProvider::ExecuteQuery("Delete From Blog Where MaBlog =" . $MaBlog);
    header("location: /WebCayCanh/QuanLyBaiViet.php");
?>