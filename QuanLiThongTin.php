
<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
	$sql = "select * from taikhoan where matk = ".$matk;
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_REQUEST['btnLuu'])){
		$MaTK = $_REQUEST['txtMaTK'];
		$TenTK = $_REQUEST['txtTenTK'];
        
		$DiaChi = $_REQUEST['txtDiaChi'];
		$SDT = $_REQUEST['txtSDT'];
		$Email = $_REQUEST['txtEmail'];
		$sql = "update taikhoan set tentk = '$TenTK', diachi='$DiaChi', sdt='$SDT',email='$Email' where matk =".$matk;

        $result = DataProvider::ExecuteQuery($sql);
        $_SESSION['TenKH'] = $TenTK;
        echo "<script>alert('Cập nhật thành công!'); location.href='QuanLiThongTin.php';</script>";
	}
?>

<?php include_once("Trenql.php"); ?>
    <div class="rightmain">
    <form name="form1" method="post" >
     <table style="height: 400px;" class="nav-justified">
        <tr>
            <td class="text-center" colspan="2">
                <caption class="text-center"></caption>
            </td>
        </tr>
                    <span style="font-size: xx-large;text-align:center">
                    <strong>&nbsp;<br />
                    Thông Tin Tài Khoản</strong></span><tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; Mã TK</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <input id="txtMaTK" name="txtMaTK" type="text" required value="<?php echo $row['MaTK']?>" style="height:32px;width:204px;background-color: 	#BBBBBB;" readonly >
            </td>
        </tr>
        <tr>
            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Tên KH</strong></td>
            <td style="height: 37px">
                <input id="txtTenTK" name="txtTenTK" type="text" value="<?php echo $row['TenTK']?>" id="TenKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 75px;"><strong>&nbsp;&nbsp;&nbsp; Địa Chỉ</strong>&nbsp;&nbsp;&nbsp; </td>
            <td style="height: 75px" class="auto-style46">
                <input id="txtDiaChi" name="txtDiaChi" type="text" value="<?php echo $row['DiaChi']?>" id="DiaChiKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 53px;"><strong>&nbsp;&nbsp;&nbsp; S</strong><span style="font-weight: bold">DT</span></td>
            <td style="height: 53px">
                <input id="txtSDT" name="txtSDT" type="text" value="<?php echo $row['SDT']?>" id="SDTKH" style="height:32px;width:204px;">
   
                
                
   
                
            </td>
            
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 26px;"><strong>&nbsp;&nbsp;&nbsp; Email</strong>&nbsp; &nbsp;<strong> </strong></td>
            <td style="height: 26px">
               <input id="txtEmail" name="txtEmail" type="text" value="<?php echo $row['Email']?>" id="EmailKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 120px;"></td>
            <td style="height: 120px">
                <input id="btnLuu" type="submit" name="btnLuu" value="Lưu" id="btnLuu" class="btnDat">
            </td>
        </tr>
    </table>
    </form>
       
   
    </div>
      

  </div>
  <form>
  <?php include_once("Duoi.php"); ?>
    