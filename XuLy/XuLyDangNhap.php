<?php
	include("DataProvider.php");
    $user =$_POST['user'];
    $pass =$_POST['pass'];
    $result = DataProvider::ExecuteQuery("SELECT * From taikhoan WHERE TenDN = '$user' AND MatKhau = '$pass'");
    if(mysqli_num_rows($result)>0)
    {

      $row = mysqli_fetch_array($result);
      $TenKH=$row["TenTK"];
      $MaTK=$row["MaTK"];
      $LoaiTK=$row["LoaiTK"];
      session_start();
      $_SESSION['TenKH'] = $TenKH;
      $_SESSION['MaTK'] = $MaTK;
      $_SESSION['LoaiTK'] = $LoaiTK;
      if($LoaiTK==1)
      {
        echo 1;
      }else{
        echo 2;
      }
          
      exit;
      }
      else
      {
          echo 'Đăng nhập thất bại';
      exit;
    }
?>
