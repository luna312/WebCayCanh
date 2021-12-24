<?php
$MaLoaiSP=$_GET['id'];
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
                <li ><a href="DonHang.php">Đơn hàng</a></li>
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
                                <h1><strong>THÊM MỚI LOẠI SẢN PHẨM</strong></h1>
                            </td>
                        </tr>
                        <?php
                                    $SP = DataProvider::ExecuteQuery("SELECT * From loaisanpham where MaLoaiSP= ".$MaLoaiSP);
                                    if($SP!=false)
                                    {
                                        if(mysqli_num_rows($SP)>0)
                                        {
                                            $row = mysqli_fetch_array($SP);
                                            $TenLoaiSP=$row["TenLoaiSP"];
                                        ?>
                         <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Mã Sản Phẩm</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbMaSp" name="tbMaSp" value="<?php echo ($MaLoaiSP) ?>" readonly style="background-color: 	#BBBBBB;"/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Tên Sản Phẩm</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbTenSP" name="tbTenSP" value="<?php echo ($TenLoaiSP) ?>"/>                  
                            </td>
                        </tr>
                        <?php
                                        
                                            
                                        }
                                        
                                    
                                    }else{
                                        echo 'Tải sản phẩm thất bại';
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
    $today = date("Y/m/d ");
	include_once("DataProvider.php");
	$sql = "Update loaisanpham set  TenLoaiSP='" . $_REQUEST["tbTenSP"] . "' where MaLoaiSP=".$MaLoaiSP;
	DataProvider::ExecuteQuery($sql);
    echo $sql;
	$maLoaiSP = -1;
	$sql = "select max(MaLoaiSP) From loaisanpham";
	$result = DataProvider::ExecuteQuery($sql);
	if($result!=false)
	{
		$row = mysqli_fetch_array($result);
		$maLoaiSP = $row["max(MaLoaiSP)"];
        $flag=1;
	}
    if($flag==1)
    {
        ?>
        <script> window.location.href = "/WebCayCanh/QuanTriLSP.php";</script>
        <?php
    }
    
}
?>