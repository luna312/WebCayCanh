<?php
$MaDH=$_GET['id'];
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
                    <table style="height: 598px;" class="nav-justified">
                        <tr>
                            <td class="text-center" colspan="2">
                                <h1><strong>SỬA DƠN HÀNG</strong></h1>
                            </td>
                        </tr>
                        <?php
                                    $DH = DataProvider::ExecuteQuery("SELECT * From donhang where MaDH= ".$MaDH);
                                    if($DH!=false)
                                    {
                                        if(mysqli_num_rows($DH)>0)
                                        {
                                            $row = mysqli_fetch_array($DH);
                                                        $MaDH = $row["MaDH"];
                                                        $NgayLapDH = $row["NgayLapDH"];
                                                        $TenKH = $row["TenKH"];
                                                        $DiaChi=$row["DiaChi"];
                                                        $SDT = $row["SDT"];
                                                        $PTTT = $row["PTTT"];
														$TrinhTrang = $row["TrinhTrang"];
														$ThanhTien = $row["ThanhTien"];
                                        ?>
                         <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Mã Đơn Hàng</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbMaDH" name="tbMaDH" value="<?php echo ($MaDH) ?>" disabled/>                           
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Ngày Lập Đơn Hàng</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbNgayLapDH" name="tbNgayLapDH" value="<?php echo ($NgayLapDH) ?>" disabled/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Tên Khách Hàng</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbTenKH" name="tbTenKH" value="<?php echo $TenKH?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;">&nbsp;&nbsp;&nbsp; <strong>Địa Chỉ&nbsp;</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbDiaChi" name="tbDiaChi" value="<?php echo ($DiaChi) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 51px;"><strong>&nbsp;&nbsp;&nbsp; Số Điện Thoại:</strong></td>
                            <td style="height: 51px">
                               <input type="text" id="tbSDT" name="tbSDT" value="<?php echo ($SDT) ?>"/>
                            
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Phương Thức TT:&nbsp;&nbsp;</strong></td>
                            <td>
                            <select name="tbPTTT" ID="tbPTTT">
                                <option value=""selected="selected"><?php echo ($PTTT) ?></option>
                                <option value="Thanh Toán Trực Tiếp">Thanh Toán Trực Tiếp</option>
                                <option value="Thanh Toán Bằng Thẻ">Thanh Toán Bằng Thẻ</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Trình Trạng&nbsp;&nbsp;&nbsp; </strong></td>
                            <td>
                            <select name="tbTrinhTrang" ID="tbTrinhTrang">
                                <option value="selected"><?php echo ($TrinhTrang) ?></option>
                                
                                <option value="Đang Chờ Xử Lý">Đang Chờ Xử Lý</option>
                                <option value="Đang Giao Hàng">Đang Giao Hàng</option>
                                <option value="Giao Hàng Thành Công">Giao Hàng Thành Công</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Thành Tiền</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbThanhTien" name="tbThanhTien" value="<?php echo ($ThanhTien) ?>"/>                  
                            </td>
                        </tr>
                        <?php
								
                                            
								}
                                        
                                    
                                    }else{
                                        echo 'Tải sản phẩn thất bại';
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
	$sql = "Update donhang set  TenKH='". $_REQUEST["tbTenKH"] . "', DiaChi='". $_REQUEST["tbDiaChi"] . "', SDT='".$_REQUEST["tbSDT"] . "',PTTT='" . $_REQUEST["tbPTTT"] . "', TrinhTrang='".$_REQUEST["tbTrinhTrang"] . "',ThanhTien=". $_REQUEST["tbThanhTien"] . " where MaDH=".$MaDH;
	DataProvider::ExecuteQuery($sql);
    echo $sql;
	$maDH = -1;
	$sql = "select max(MaDH) From DonHang";
	$result = DataProvider::ExecuteQuery($sql);
	if($result!=false)
	{
		$row = mysqli_fetch_array($result);
		$maDH = $row["max(MaDH)"];
        $flag=1;
	}
    if($flag==1)
    {
        ?>
        <script> window.location.href = "/WebCayCanh/QuanTriDonHang.php";</script>
        <?php
    }
}
?>