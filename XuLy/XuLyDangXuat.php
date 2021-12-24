<?php
    session_start();
    $_SESSION['MaTK']='';
    $_SESSION['TenKH']='';
    $_SESSION['TenDN']='';
    $_SESSION['MK']='';
    $_SESSION['LoaiTK']='';
    header("Location: ../Default.php");
exit;
?>