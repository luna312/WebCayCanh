<?php 
    session_start();
 $masp= $_GET['id'];
 for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
 {
    if($_SESSION['id_them_vao_gio'][$i]==$masp)
     {
        $_SESSION['sl_them_vao_gio'][$i]=0;
     }
     
 }
 header("location: /WebCayCanh/GioHang.php");
?>