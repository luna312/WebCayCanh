<?php
	include("DataProvider.php");
    $user =$_POST['user'];
    $pass =$_POST['pass'];
	$repass=$_POST['repass'];
	$tenkh=$_POST['tenkh'];
	$email=$_POST['email'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
    $result = DataProvider::ExecuteQuery("SELECT * From taikhoan WHERE TenDN = '$user'");
    if(mysqli_num_rows($result)>0)
    {
		echo ("Tài khoản đã được đăng ký");
    }
    else{
		$result = DataProvider::ExecuteQuery("Insert into taikhoan (TenTK,Email,DiaChi,SDT,TenDN,MatKhau,LoaiTK) values (N'$tenkh','$email',N'$diachi',$sdt,'$user','$pass',2)");
		if($result){
			echo 1;
			session_start();
			$_SESSION['TenDN'] = $user;
    		$_SESSION['MK'] = $pass;
		}
     	else{
			echo ("Đăng Ký Thất Bại ");
		}
        
    }
?>
