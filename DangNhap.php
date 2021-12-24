<?php include_once("Tren.php"); ?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- làm việc với ajax -->
<!-- Ngăn hành động load trang dòng 28  -->
<script>
    $(document).ready(function()
    {
        $('#btnDN').click(function(e)
            {
                e.preventDefault(); 
                var $username = $('#txtUsername').val();
                var $password = $('#txtPassword').val();
                // Kiểm tra nếu username rỗng thì báo lỗi
                if ($username == "") {
                     $('.result').html("Tên đăng nhập không được để trống");
                    return false;
                }
                // Kiểm tra nếu password rỗng thì báo lỗi
                if ($password == "") {
                     $('.result').html("Mật khẩu không được để trống");
                    return false;
                }
                $.ajax
                ({
                    url: 'Xuly/XuLyDangNhap.php',
                    type: 'post', //post và get
                    dataType: 'html',
                    data: {
                        user : $username,
                        pass : $password
                    }
                }).done(function(ketqua)
                {
                    if(ketqua==1)
                    {
                         window.location.href = "/WebCayCanh/QuanTri.php";
                         
                    }else if(ketqua==2){
                        window.location.href = "/WebCayCanh/Default.php";
                    }else{
                        $('.result').html(ketqua);
                    }
                });

            });
    });
</script>
    <div class="rightmain">
        <form>
    
    <table style="width:100%;">
    <tr>
        <td class="phantrang" colspan="2" style="font-size: xx-large"><strong>Đăng Nhập</strong></td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 49px"><strong>Tài Khoản: </strong></td>
        <td style="height: 49px">
        	<input type="text" id="txtUsername" name="Username" class="input" value="<?php if(!empty($_SESSION['TenDN'])) echo $_SESSION['TenDN'];?>"   >
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 48px"><strong>Mật Khẩu: </strong></td>
        <td style="height: 48px">
        <input type="password" id="txtPassword" name="Password" class="input" value="<?php if(!empty($_SESSION['MK'])) echo $_SESSION['MK'];?>"    >
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 61px"></td>
        <td class="kc" style="height: 61px">
        <input type="submit" name="btnDN" class="btnDat" id="btnDN" value="Đăng Nhập" />
        </td>
    </tr>
</table>
<div align="center" class="result"></div>
</form>
  </div>
    </div>
    <?php include_once("Duoi.php"); ?>