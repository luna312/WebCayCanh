<?php
include_once("DataProvider.php");
session_start();
$matk=$_SESSION['MaTK'];
$TenKH=$_SESSION['TenKH'];
$LoaiTK= $_SESSION['LoaiTK'];
$today = date("Y/m/d ");
if(empty($_SESSION['LoaiTK'])||$_SESSION['LoaiTK']==2)
{
    
    header("Location: Default.php");   
}
if(isset($_REQUEST['btnLuu'])){
    $TieuDe = $_REQUEST['txtTieuDe'];
    $TTND = $_REQUEST['txtTomTatND'];
    $NoiDung = $_REQUEST['txtNoiDung'];
    $sql = "insert into Blog (TieuDe, TTND, NoiDung,MaTK,NgayDang) values ('".$TieuDe."','".$TTND."','".$NoiDung."',".$matk.",'".$today."')";

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
            $sql = "Update Blog Set HinhAnh='" . $tenHinh. "' Where MaBlog=" . $maBlog;
            DataProvider::ExecuteQuery($sql);
        }
    header("location: DanhSachBlog.php");
}
?>
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
                    echo "Xin ch??o: ".$TenKH;
                ?>
                <hr />
            </li>
            <li><a href="XuLy/XulyDangXuat.php">Trang Ch???</a></li>
            <li>Qu???n Tr??? Danh M???c</li>
            <ul class="con">
                
                <li class="SanPham"><a href="QuanTri.php">S???n Ph???m</a></li>
                <li><a href="QuanTriLSP.php">Lo???i S???n Ph???m</a></li>
                <li><a href="DanhSachBlog.php">Blog</a></li>
            </ul>
            <li>Qu???n Tr??? ????n H??ng</li>
            <ul class="con">
                <li ><a href="DonHang.php">????n h??ng</a></li>
            </ul>
            <li>Qu???n Tr??? t??i kho???n</li>
            <ul class="con">
                <li ><a href="QuanTriTaiKhoan.php">T??i kho???n</a></li>
            </ul>
        </ul>
        </div>
        <div class="content">
            <div class="quantri">
                    <table style="height: 598px;" class="nav-justified" ">
                        <tr>
                            <td class="text-center" colspan="2">
                                <h1><strong>TH??M M???I BLOG</strong></h1>
                            </td>
                        </tr>
                        <tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; Ti??u ?????:</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <textarea name="txtTieuDe" id="txtTieuDe" rows="3"  cols="60"></textarea>
            </td>
        </tr>
        <tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; T??m t???t ND:</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <textarea name="txtTomTatND" id="txtTomTatND" rows="3"  cols="60"></textarea>
            </td>
        </tr>
        <tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; N???i dung:</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <textarea name="txtNoiDung" id="txtNoiDung" rows="10"  cols="90"></textarea>
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 36px;"><strong>&nbsp;&nbsp;&nbsp; H??nh Minh H???a</strong></td>
                <td style="height: 36px">
                    <input type="file" name="fileupload" id="fileupload">
                                
                </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 120px;"></td>
            <td style="height: 120px">
                <input id="btnLuu" type="submit" name="btnLuu" value="L??u" id="btnLuu" class="btnDat">
            </td>
         </tr>
                    </table>
                    <div align="center" class="result"></div>
             </div>
            <div class="footer"> 
      
                Trang Qu???n Tr???
                <br />
                Copyright @ 2020 @ by TTT . All right reserved.</div>
            </div>
            </div>
            
            

    </form>
</body>
</html>