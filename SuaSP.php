<?php
$MaSP=$_GET['id'];
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
                                <h1><strong>THÊM MỚI SẢN PHẨM</strong></h1>
                            </td>
                        </tr>
                        <?php
                                    $SP = DataProvider::ExecuteQuery("SELECT * From sanpham where MASP= ".$MaSP);
                                    if($SP!=false)
                                    {
                                        if(mysqli_num_rows($SP)>0)
                                        {
                                            $row = mysqli_fetch_array($SP);
                                            $TenSP=$row["TenSP"];
                                            $DonGia=$row["TienSP"];
                                            $NhaCungCap=$row["NhaCC"];
                                            $Mota=$row["Mota"];
                                            $LoaiSp=$row["MaLoaiSP"];
                                            $SL=$row["SoLuongSP"];
                                            $SLb=$row["SoLuongBan"];
                                            $SLX=$row["SoLanXem"];
                                        ?>
                         <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Mã Sản Phẩm</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbMaSp" name="tbMaSp" value="<?php echo ($MaSP) ?>" readonly style="background-color: 	#BBBBBB;"/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Tên Sản Phẩm</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbTenSP" name="tbTenSP" value="<?php echo ($TenSP) ?>"/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Đơn Giá</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbDonGia" name="tbDonGia" value="<?php echo ($DonGia) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;">&nbsp;&nbsp;&nbsp; <strong>Nhà Cung Cấp&nbsp;</strong></td>
                            <td style="height: 36px">
                                <input type="text" ID="tbNCC" name="tbNCC" value="<?php echo ($NhaCungCap) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 51px;"><strong>&nbsp;&nbsp;&nbsp; Mô Tả:</strong></td>
                            <td style="height: 51px">
                               <textarea id="tbND" name="tbND" style="width: 465px; height: 100px" value="" ><?php echo ($Mota) ?></textarea>
                            
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Hình Minh Họa</strong></td>
                            <td style="height: 36px">
                            <input type="file" name="fileupload" id="fileupload">
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Loại Sản Phẩm:&nbsp;&nbsp;</strong></td>
                            <td>
                            <select name="LoaiSP" ID="LoaiSP">
                                <option value=""selected="selected">--Chọn--</option>
                                <?php
                                    $dsLoaiSP = DataProvider::ExecuteQuery("SELECT * From loaisanpham ");
                                    if($dsLoaiSP!=false)
                                    {
                                        if(mysqli_num_rows($dsLoaiSP)>0)
                                        {
                                        ?>
                                    
                                        <?php
                                            while($row = mysqli_fetch_array($dsLoaiSP))
                                                {
                                                    $TenLoaiSP = $row["TenLoaiSP"];
                                                    $MaLoaiSP=$row["MaLoaiSP"];
                                                    ?>
                                                    <option value="<?php echo ($MaLoaiSP)?>"<?php
                                                        if($MaLoaiSP==$LoaiSp)
                                                        {
                                                            echo"selected='selected'";
                                                        }
                                                    ?>"><?php echo ($TenLoaiSP)?></option>
                                                    <?php
                                                }
                                        ?>
                                            <?php
                                        
                                            
                                        }
                                        
                                    
                                    }else{
                                        echo 'Tải loại sản phẩm thất bại';
                                        exit;
                                    }
                                    ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; "><strong>&nbsp;&nbsp;&nbsp; Số Lượng&nbsp;&nbsp;&nbsp; </strong></td>
                            <td>
                                <input type="text" ID="tbSoLuong" name="tbSoLuong" value="<?php echo ($SL) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Số lượng bán</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbSoLuongBan" name="tbSoLuongBan" value="<?php echo ($SLb) ?>"/>                  
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 41px; width: 150px"><strong>&nbsp;&nbsp;&nbsp; Số lượt xem</strong></td>
                            <td style="height: 41px">
                                <input type="text" ID="tbSoLuotXem" name="tbSoLuotXem" value="<?php echo ($SLX) ?>"/>                  
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
	$sql = "Update SanPham set  TenSP='" . $_REQUEST["tbTenSP"] . "', TienSP=". $_REQUEST["tbDonGia"] . ", NhaCC='".$_REQUEST["tbNCC"] . "',Mota='" . $_REQUEST["tbND"] . "', MaLoaiSP=".$_REQUEST["LoaiSP"] . ",NgayCapNhat='".$today."',SoLuongBan=". $_REQUEST["tbSoLuongBan"] . ",SoLanXem=".$_REQUEST["tbSoLuotXem"] . ", SoLuongSP=".$_REQUEST["tbSoLuong"] ." where MaSP=".$MaSP;
	DataProvider::ExecuteQuery($sql);
    echo $sql;
	$maSP = -1;
	$sql = "select max(MaSP) From SanPham";
	$result = DataProvider::ExecuteQuery($sql);
	if($result!=false)
	{
		$row = mysqli_fetch_array($result);
		$maSP = $row["max(MaSP)"];
        $flag=1;
	}
	if (is_uploaded_file($_FILES['fileupload']['tmp_name']))
	{
		$fileName = $_FILES['fileupload']['name'];
		$pos = strrpos( $fileName, "." );
		$fileExtension = substr($fileName,$pos);
		$hinhCay = "Anh/CayCanh/" . $maSP . $fileExtension;
        $tenHinh =  $maBlog . $fileExtension;
		move_uploaded_file($_FILES['fileupload']['tmp_name'], $hinhCay );
		$sql = "Update SanPham Set HinhAnh='" . $tenHinh . "' Where MaSP=" . $maSP;
		DataProvider::ExecuteQuery($sql);
	}
    if($flag==1)
    {
        ?>
        <script> window.location.href = "/WebCayCanh/QuanTri.php";</script>
        <?php
    }
    
}
?>