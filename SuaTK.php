<?php
$MaTK=$_GET['id'];
include("DataProvider.php");
session_start();
$TenKH=$_SESSION['TenKH'];
$LoaiTK= $_SESSION['LoaiTK'];
if(empty($_SESSION['LoaiTK'])||$_SESSION['LoaiTK']==2)
{
    
    header("Location: Default.php");   
}
?>
<!DOCTYPE html>

<html>
<head runat="server">
    <title></title>
    <link href="CSSQuanTri.css" rel="stylesheet" />
    
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    </head>
<body>
    <form id="form1" action="" method="post" enctype="multipart/form-data">
        
        <div class="noidung">
        <div class="leftmenu">
        <ul>
            <li>
				<?php
                        echo "Xin chào: ".$TenKH;
                    ?>
                    <hr />
            </li>
            <li><a href="XuLy/XulyDangXuat.php">Trang Chủ</a></li>
            <li>Quản Trị Danh Mục</li>
            <ul class="con">
                
                <li class="SanPham"><a href="QuanTri.php">Sản Phẩm</a></li>
                <li><a href="QuanTriLSP.php">Loại Sản Phẩm</a></li>
                <li><a href="DanhSachBlog.php">Blog</a></li>
            </ul>
            <li>Quản Trị Đơn Hàng</li>
            <ul class="con">
                <li ><a href="QuanTriDonHang.php">Đơn hàng</a></li>
            </ul>
            <li>Quản Trị tài khoản</li>
            <ul class="con">
                <li ><a href="QuanTriTaiKhoan.php">Tài khoản</a></li>
            </ul>
        </ul>
        </div>
        <div class="content">
            <div class="quantri">
                    <table style="height: 598px;" class="nav-justified" ">
                        <tr>
                            <td class="text-center" colspan="2">
                                <h1><strong>SỬA TÀI KHOẢN</strong></h1>
                            </td>
                        </tr>
                        <?php
                                    $TK = DataProvider::ExecuteQuery("SELECT * From taikhoan where MaTK= ".$MaTK);
                                    if($TK!=false)
                                    {
                                        if(mysqli_num_rows($TK)>0)
                                        {
                                            $row = mysqli_fetch_array($TK);
                                            $TenTK=$row["TenTK"];
                                            $Email=$row["Email"];
                                            $DiaChi=$row["DiaChi"];
                                            $SDT=$row["SDT"];
                                            $TenDN=$row["TenDN"];
                                            $MatKhau=$row["MatKhau"];
										
                                        ?>
                         <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Mã Tài Khoản</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbMaTK" name="tbMaTK" value="<?php echo ($MaTK) ?>" readonly style="background-color: 	#BBBBBB;"/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Tên Tài Khoản</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbTenTK" name="tbTenTK" value="<?php echo ($TenTK) ?>"/>       
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Email</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbEmail" name="tbEmail" value="<?php echo ($Email) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;">&nbsp;&nbsp;&nbsp; <strong>Địa Chỉ&nbsp;</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbDiaChi" name="tbDiaChi" value="<?php echo ($DiaChi) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 51px;"><strong>&nbsp;&nbsp;&nbsp; SDT:</strong></td>
                            <td style="height: 51px">
                               <input type="text" id="tbSDT" name="tbSDT" value="<?php echo ($SDT) ?>"/>
                            
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Tên Đăng Nhập</strong></td>
                            <td style="height: 36px">
 								<input type="text" id="tbTenDN" name="tbTenDN" value="<?php echo ($TenDN) ?>"/>
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Mật Khẩu</strong></td>
                            <td style="height: 36px">
 								<input type="text" id="tbMatKhau" name="tbMatKhau" value="<?php echo ($MatKhau)?>"/>
                            </td>
                        </tr>

                                                <?php
                                        
                                            
                                        }
                                        
                                    
                                    }else{
                                        echo 'Tải tài khoản thất bại';
                                        exit;
                                    }
                                    ?>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left">&nbsp;</td>
                            <td>
                                <input type="submit" ID="btnLuu" name="btnLuu" Class="btnDat" value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    <div align="center" class="result"></div>
             </div>
            <div class="footer"> 
      
                Trang Quản Trị
                <br />
                Copyright @ 2020 @ by TTT . All right reserved.</div>
            </div>
            </div>
            
            

    </form>
</body>
</html>
<?php
	if(isset($_REQUEST["btnLuu"]))
	{
		$flag=0;
		include_once("DataProvider.php");
		$sql = "Update taikhoan set  TenTK='" . $_REQUEST["tbTenTK"] . "', Email='". $_REQUEST["tbEmail"] . "', DiaChi='".$_REQUEST["tbDiaChi"] . "', SDT='".$_REQUEST["tbSDT"] . "',TenDN='". $_REQUEST["tbTenDN"] . "',MatKhau='".$_REQUEST["tbMatKhau"] . "'where MaTK=".$MaTK;
		DataProvider::ExecuteQuery($sql);
		echo $sql;
		$maTK = -1;
		$sql = "select max(MaTK) From taikhoan";
		$result = DataProvider::ExecuteQuery($sql);
		if($result!=false)
		{
			$row = mysqli_fetch_array($result);
			$maTK = $row["max(MaTK)"];
			$flag=1;
		}

		if($flag==1)
		{
			?>
			<script> window.location.href = "/WebCayCanh/QuanTriTaiKhoan.php";</script>
			<?php
		}  
	}
?>