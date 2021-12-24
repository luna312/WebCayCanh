<?php
	include("DataProvider.php");
	$sql = "select * from taikhoan where matk = 2";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_POST['luu'])){
		$MaTK = $_REQUEST[['txt'];
		$TenTK = $_POST['TenTK'];
		$DiaChi = $_POST['DiaChi'];
		$SDT = $_POST['SDT'];
		$Email = $_POST['Email'];
		$sql = "update taikhoan set tentk = '$TenTK', diachi='$DiaChi', sdt='$SDT',email='$Email' where matk = $id";
		echo $sql;
        $result = DataProvider::ExecuteQuery($sql);
		if($result){
			echo ("Lưu thành công");
		}else{
			echo ("Lưu không thành công");
		}

	}
?>
<html>
<head>

    <title></title>

    <link href="CSS.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="dropdownt.js"></script>
   
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
  
    <style type="text/css">
        .auto-style6 {
            width: 372px;
        }
        .auto-style8 {
            width: 654px;
        }
        .auto-style10 {
            width: 372px;
            color: #499C4D;
        }
        .auto-style11 {
            color: #499C4D;
            
        }
        .auto-style14 {
            width: 100%;
            height: 153px;
        }
        .auto-style39 {
            height: 18px;
            text-align: center;
        }
        .auto-style40 {
            height: 5px;
            text-align: center;
        }
        .auto-style42 {
            height: 15px;
            text-align: center;
        }
        .auto-style43 {
            width: 226px;
            margin: 5px;
            padding: 5px;
        }
        .auto-style44 {
            color: #006600;
        }
        .auto-style45 {
            width: 654px;
            height: 29px;
        }
        .auto-style46 {
            height: 29px;
        }
        .auto-style48 {
            color: #009933;
        }
        .auto-style49 {
            color: #009900;
        }
        </style>

</script> 
</head>

<body>
    <form id="form1"  autocomplete="off">
        <div class="container">
  <div class="header">
    
    
      <table style="width:100%;">
          <tr class="dndk">
                 

              
              <td class="auto-style6" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp; <img alt="banner" class="banner" src="Image/logo.png" />&nbsp;</td>
              <td class="auto-style45" ></td>
              <td class="auto-style46"><strong>
                  <span class="auto-style44">
                      <a ID="hpDN" href=""><span class="auto-style48">Đăng nhập</span></a>
                  
                  </a>
                  </span>
                  <span class="auto-style48">|</span><span class="auto-style44"><a ID="hpDN" href=""><span class="auto-style48">Đăng xuất</span></a>
&nbsp;<a ID="hpDK"   href=""><span class="auto-style48">Đăng Kí</span></a>
                  </span>
                  </strong></td>
              
          </tr>
          <tr>
              <td class="search" style="width: 654px" >
                  <input name="" type="text" id="tbNDTimKiem">
            
                  <input type="submit" name="" value="Tìm" id="btnTimKiem" class="btnDat" style="height:40px;width:72px;">
            
              </td>
              <td class="giohang" ><a href=""><i class="fa fa-shopping-cart"></i><span class="auto-style11"><strong>Giỏ hàng</strong></span></a>
                  
                 
              </td>
          </tr>
          <tr>
              
              <td class="auto-style10">&nbsp;</td>
              <td class="auto-style8">&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
      </table>
    
    
  </div>
  <div class="menu">     
	<ul>
     <li><a href="#">Trang Chủ</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li><a href="#">Cây cảnh</a>
        <ul class="submenu">
        
        </ul>
      </li>
      
      <li><a href="#">Blog - Tin tức</a></li>
      <li class="auto-style12"><a href="#">Hỗ trợ - Liên hệ</a></li>

        </ul>
    
    
  </div>
            
  <div class="container content">
      
    <div class="leftmain">
    	<div class="Danhsach">
        <div class="leftthongtin">
        <table style="width: 100%; height: 178px;">
            <tr>
                <td class="tieude phantrang" style="height: 43px"><strong>Quản lí tài khoản</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="ThongTinTaiKhoan.php">Thông tin tài khoản</a>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: left; height: 33px;">
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Đổi mật khẩu</a>
                </td>
            </tr>
            
            <tr>
                <td style="height: 28px; text-align: left;" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Quản lý giỏ hàng</a>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Quản lý bài viết</a>
                </td>
            </tr>
        </table>
    </div>
      </div>
    </div>
  <form name="form1" method="post" action="ThongTinTaiKhoan.php">
     <table style="height: 598px;" >
        <tr>
            <td class="text-center" colspan="2">
                <caption class="text-center"></caption>
            </td>
        </tr>
                    <span style="font-size: xx-large">
                    <strong>&nbsp;<br />
                    Thông Tin Tài Khoản</strong></span>
         <tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; Mã TK</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <input name="maKH" id=  type="text" required value="<?php echo $row['MaTK']?>" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Tên KH</strong></td>
            <td style="height: 37px">
                <input name="" type="text" value="<?php echo $row['TenTK']?>" id="TenKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 75px;"><strong>&nbsp;&nbsp;&nbsp; Địa Chỉ</strong>&nbsp;&nbsp;&nbsp; </td>
            <td style="height: 75px" class="auto-style46">
                <input name="" type="text" value="<?php echo $row['DiaChi']?>" id="DiaChiKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 53px;"><strong>&nbsp;&nbsp;&nbsp; S</strong><span style="font-weight: bold">DT</span></td>
            <td style="height: 53px">
                <input name="" type="text" value="<?php echo $row['SDT']?>" id="SDTKH" style="height:32px;width:204px;">
   
                
                
   
                
            </td>
            
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 26px;"><strong>&nbsp;&nbsp;&nbsp; Email</strong>&nbsp; &nbsp;<strong> </strong></td>
            <td style="height: 26px">
               <input name="" type="text" value="<?php echo $row['Email']?>" id="EmailKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 120px;"></td>
            <td style="height: 120px">
                <input type="submit" name="luu" value="Lưu" id="btnLuu" class="btnDat">
            </td>
        </tr>
    </table>
    </form>
       
   
    </div>
      

  </div>
  <form>
  <div class="footer"> 
      <table class="auto-style14">
          <tr>
              <td class="auto-style40">Địa chỉ: Đường Lê Chí Dân, phường Tương Bình Hiệp, TP. Thủ Dầu Một, Tỉnh Bình Dươngcanh@gmail.com</td>
          </tr>
          <tr>
              <td class="auto-style42">SĐT: 0903000063</td>
          </tr>
          <tr>
              <td class="auto-style39">Copyright @ 2020 @ by TTT . All right reserved.</td>
          </tr>
      </table>
            </div>
</div>
        
    </form>
 
   
</body>
</html>
