<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
	if(isset($_REQUEST['btnLuu'])){
		$MatKhauCu = $_REQUEST['txtMatKhauCu'];
		$MatKhauMoi = $_REQUEST['txtMatKhauMoi'];
		$NhapLaiMK = $_REQUEST['txtNhapLaiMatKhauMoi'];
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $('#btnLuu').click(function(e)
                {
                    e.preventDefault(); 
                    var $matkhaucu = $('#txtMatKhauCu').val();
                    var $matkhaumoi = $('#txtMatKhauMoi').val();
					var $nhaplaimatkhau = $('#txtNhapLaiMatKhau').val();
					if ($matkhaucu == "") {
						 $('.result').html("Bạn chưa nhập mật khẩu cũ ");
						return false;
					}
					// Kiểm tra nếu password rỗng thì báo lỗi
					if ($matkhaumoi == "") {
						 $('.result').html("Bạn chưa nhập mật khẩu mới ");
						return false;
					}
					// Kiểm tra nếu password không trùng với repassword thì báo lỗi
					if ($matkhaumoi != $nhaplaimatkhau) {
						 $('.result').html("Mật khẩu nhập lại không trùng");
						return false;
					}
                    $.ajax
                    ({
                        url: 'XuLy/XuLyDoiMK.php',
                        type: 'post', //post và get
                        dataType: 'html',
                        data: {
							matkhaucu : $matkhaucu,
                    		matkhaumoi : $matkhaumoi,
							nhaplaimatkhau : $nhaplaimatkhau,
                        }
                    }).done(function(ketqua)
                    {
                        $('.result').html(ketqua);
						
                    });

                });
        });
    </script>
<?php include_once("Trenql.php"); ?>
    <div class="rightmain" style="height:900px">
    <form name="form2" method="post" action="" onSubmit="return fcTest()">
     <table style="width: 100%;">
    <tr>
        <td class="phantrang" colspan="2" style="font-size: xx-large"><strong>Đổi mật khẩu</strong></td>
    </tr>
    <tr>
        <td style="width: 441px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nhập mật khẩu cũ&nbsp;:</strong></td>
            </td>
        <td>
                <input id="txtMatKhauCu" name="txtMatKhauCu" type="password" required value="" style="height:32px;width:204px;">
        </td>
    </tr>
    <tr>
        <td style="width: 441px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nhập mật khẩu&nbsp;mới:</strong></td>
        <td>
                <input id="txtMatKhauMoi" name="txtMatKhauMoi" type="password" required value="" style="height:32px;width:204px;">
            </td>
    </tr>
    <tr>
        <td style="width: 441px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nhập lại MK:</strong></td>
        <td>
                <input id="txtNhapLaiMatKhau" name="txtNhapLaiMatKhauMoi" type="password" required value="" style="height:32px;width:204px;">
        </td>
    </tr>
    <tr>
        <td style="width: 441px">&nbsp;</td>
        <td>
                <input id="btnLuu" type="submit" name="btnLuu" value="Đổi mật khẩu" id="btnLuu" class="btnDat">
                <br />
                <br />
         </td>
    </tr>
</table>
    </form>
        <td>
        	<div class="result" style="text-align:center"></div>
        </td>
       
   
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
