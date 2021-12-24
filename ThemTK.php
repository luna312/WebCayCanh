<?php
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
                                <h1><strong>THÊM MỚI TÀI KHOẢN</strong></h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Tên Tài Khoản</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbTenTK" name="tbTenTK" />                  
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Email</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbEmail" name="tbEmail" />
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;">&nbsp;&nbsp;&nbsp; <strong>Địa Chỉ&nbsp;</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbDiaChi" name="tbDiaChi"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 51px;"><strong>&nbsp;&nbsp;&nbsp; SDT:</strong></td>
                            <td style="height: 51px">
                                <input type="text" IDD="tbSDT" name="tbSDT" />
                            
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Tên Đăng Nhập</strong></td>
                            <td style="height: 36px">
                            <input type="text" name="tbTenDN" id="tbTenDN">
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Mật Khẩu:&nbsp;&nbsp;</strong></td>
                            <td>
                            <input type="text" name="tbMatKhau" ID="tbMatKhau" />
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Loại Tài Khoản:&nbsp;&nbsp;</strong></td>
                            <td>
                            <input type="text" name="tbLoaiTK" ID="tbLoaiTK" />
                            </td>
                        </tr>
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
	$sql = "Insert into TaiKhoan ( TenTK, Email, DiaChi,SDT, TenDN, MatKhau, LoaiTK) values (";
	$sql .= "'" . $_REQUEST["tbTenTK"] . "','";
	$sql .=  $_REQUEST["tbEmail"] . "',";
	$sql .= "'".$_REQUEST["tbDiaChi"] . "'," ;
	$sql .= "'" . $_REQUEST["tbSDT"] . "','";
	$sql .= $_REQUEST["tbTenDN"] . "','" ;
	$sql .= $_REQUEST["tbMatKhau"] . "'," ;
	$sql .= $_REQUEST["tbLoaiTK"] . ")" ;
	DataProvider::ExecuteQuery($sql);
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