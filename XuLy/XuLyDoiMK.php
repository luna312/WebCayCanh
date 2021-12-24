<?php
	include("DataProvider.php");
	session_start();
    $matk=$_SESSION['MaTK'];
    $matkhaucu =$_POST['matkhaucu'];
    $matkhaumoi =$_POST['matkhaumoi'];
	$nhaplaimatkhau=$_POST['nhaplaimatkhau'];
	$sql = "Select MatKhau from taikhoan where matk='".$matk."' AND MatKhau='".$matkhaucu."' LIMIT 1";
    $result = DataProvider::ExecuteQuery($sql);
	$count = mysqli_num_rows($result);
	if($count>0)
	{
		$result = DataProvider::ExecuteQuery("update taikhoan set MatKhau = '$matkhaumoi' where matk = ".$matk);
		echo ("Đổi mật khẩu thành công!!!");
	}
    else{
		echo ("Mật khẩu cũ không khớp, vui lòng nhập chính xác mật khẩu cũ!!");
	}
?>