<?php
include("DataProvider.php");
session_start();
$TenKH=$_SESSION['TenKH'];
$LoaiTK= $_SESSION['LoaiTK'];
$MaBlg=$_GET['id'];
$sql = "select * from Blog where MaBlog = ".$MaBlg;
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_assoc($result);
if(empty($_SESSION['LoaiTK'])||$_SESSION['LoaiTK']==2)
{
    
    header("Location: Default.php");   
}
if(isset($_REQUEST['btnLuu'])){
    $tieuDe = $_REQUEST['txtTieuDe'];
    $tTND = $_REQUEST['txtTomTatND'];
    $noiDung = $_REQUEST['txtNoiDung'];
    $luotXem = $_REQUEST['txtLuotXem'];
    $sql = "update Blog set TieuDe = '$tieuDe', TTND='$tTND', NoiDung='$noiDung', SoLanXem='$luotXem' where MaBlog =".$MaBlg;

    $result = DataProvider::ExecuteQuery($sql);

    $maBlog = -1;
    $sql = "select max(MaBlog) From Blog";
    $result = DataProvider::ExecuteQuery($sql);
    if($result!=false)
    {
        $row = mysqli_fetch_array($result);
        $maBlog = $row["max(MaBlog)"];
        $flag=1;
    }
    if (is_uploaded_file($_FILES['fileupload']['tmp_name']))
    {
        $fileName = $_FILES['fileupload']['name'];
        $pos = strrpos( $fileName, "." );
        $fileExtension = substr($fileName,$pos);
        $hinhBlog = "Anh/Blog/" . $maBlog . $fileExtension;
        $tenHinh =  $maBlog . $fileExtension;
        move_uploaded_file($_FILES['fileupload']['tmp_name'], $hinhBlog );
        $sql = "Update Blog Set HinhAnh='" . $tenHinh . "' Where MaBlog=" . $MaBlg;
        DataProvider::ExecuteQuery($sql);
    }
    header("location: DanhSachBlog.php");
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
                                <h1><strong>SỬA BLOG</strong></h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Mã Blog:</strong></td>
                            <td style="height: 37px">
                                <input id="txtMaBlog" name="txtMaBlog"  type="text" value="<?php echo $row['MaBlog']?>" style="height:32px;width:204px;" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Tiêu đề:</strong></td>
                            <td style="height: 37px">
                                <textarea name="txtTieuDe" id="txtTieuDe" rows="3"  cols="90"><?php echo $row['TieuDe']?></textarea>                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Tóm tắt ND:</strong></td>
                            <td style="height: 37px">
                                <textarea name="txtTomTatND" id="txtTomTatND" rows="3"  cols="90"><?php echo $row['TTND']?></textarea>                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 75px;"><strong>&nbsp;&nbsp;&nbsp; Nội dung:</strong>&nbsp;&nbsp;&nbsp; </td>
                            <td style="height: 75px" class="auto-style46">
                                <textarea name="txtNoiDung" id="txtNoiDung" rows="10"  cols="90"><?php echo $row['NoiDung']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; Hình Minh Họa</strong></td>
                                <td style="height: 36px">
                                    <input type="file" name="fileupload" id="fileupload">
                                                
                                </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Số lần xem:</strong></td>
                            <td style="height: 37px">
                                <input id="txtLuotXem" name="txtLuotXem"  type="text" value="<?php echo $row['SoLanXem']?>" style="height:32px;width:204px;" >
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-sm" style="width: 124px; text-align: left; height: 120px;"></td>
                            <td style="height: 120px">
                                <input id="btnLuu" type="submit" name="btnLuu" value="Lưu" id="btnLuu" class="btnDat">
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