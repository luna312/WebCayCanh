<html>
<head runat="server">

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
            $('#btnDK').click(function(e)
                {
                    e.preventDefault(); 
                    var $username = $('#txtUsername').val();
                    var $password = $('#txtPassword').val();
					var $repassword = $('#txtRePassword').val();
					var $tenkh = $('#txtTenKH').val();
					var $email = $('#txtEmail').val();
					var $diachi = $('#txtDiaChi').val();
					var $sdt = $('#txtSDT').val();
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
					// Kiểm tra nếu password không trùng với repassword thì báo lỗi
					if ($password != $repassword) {
						 $('.result').html("Mật khẩu nhập lại không trùng");
						return false;
					}
					// Kiểm tra tên khách hàng nếu trống thì báo lỗi
					if ($tenkh == "") {
						 $('.result').html("Tên khách hàng không được trống");
						return false;
					}
					
					// Kiểm email nếu trống thì báo lỗi
					if ($email == "") {
						 $('.result').html("Email không được trống");
						return false;
					}
					// Kiểm tra địa chỉ nếu trống thì báo lỗi
					if ($diachi == "") {
						 $('.result').html("Địa chỉ không được trống");
						return false;
					}
					// Kiểm tra SDT nếu trống thì báo lỗi
					if ($sdt == "") {
						 $('.result').html("Số điện thoại không được trống");
						return false;
					}
                    $.ajax
                    ({
                        url: 'Xuly/XuLyDangKy.php',
                        type: 'post', //post và get
                        dataType: 'html',
                        data: {
                            user : $username,
                            pass : $password,
							repass: $repassword,
							tenkh: $tenkh,
							diachi: $diachi,
							email: $email,
							sdt: $sdt
                        }
                    }).done(function(ketqua)
                    {
                        if(ketqua==1)
                        {
                            window.location.href = "/WebCayCanh/DangNhap.php";
                        }else{
                            $('.result').html(ketqua);
                        }
                        
						
                    });

                });
        });
    </script>
</head>

<body>
<?php 
        
   
       

 
            
            echo "<style>.lbTenDN{display:none } .hpDX{ display:none}</style>";

        ?>
    <form id="form1" runat="server" autocomplete="off">
        <div class="container">
  <div class="header">
    
    
      <table style="width:100%;">
      <tr class="dndk">
                 

              
                 <td class="auto-style6" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp; <img alt="banner" class="banner" src="Anh/logo.png" />&nbsp;</td>
                 <td class="auto-style45" ></td>
                 <td class="auto-style46"><strong>
                     <span class="auto-style44">
                         <a class="hpDN" runat="server" href="DangNhap.php"><span class="auto-style48">Đăng nhập</span></a>
                         <!--<Label class="lbTenDN" class="auto-style49" >Xin Chào:</Label>-->
                     <a class="hpTenDN" runat="server" href="QuanLiThongTin.php">
                       
                     </a>
                     </span>
                     <span class="auto-style48">|</span><span class="auto-style44"><a href='XuLy/XulyDangXuat.php' class="hpDX" runat="server"   class="auto-style48">Đăng Xuất</a>
   &nbsp;<a class="hpDK" runat="server"  href="DangKy.php"><span class="auto-style48">Đăng Kí</span></a>
                     </span>
                     </strong></td>
                 
             </tr>
          <tr>
              <td class="search" style="width: 654px" >
                  <asp:TextBox ID="tbNDTimKiem" runat="server"></asp:TextBox>
            
                  <asp:Button ID="btnTimKiem" runat="server" CssClass="btnDat" Height="40px"  Text="Tìm" Width="72px"  />
            
              </td>
              <td class="giohang" ><a href="../../GioHang.php"><i class="fa fa-shopping-cart"></i><span class="auto-style11"><strong>Giỏ hàng</strong></span></a>
                  <!--<div class="minicart">
                      <ul class="minicart-sanpham">
                          <li><a href="#"><img src="Anh/logo.png" width="30" height="30" />Sản phẩm 1</a><button><i class="fa fa-close"></i></button></li>
                          <li><a href="#"><img src="Anh/logo.png" width="30" height="30" />Sản phẩm 2</a><button><i class="fa fa-close"></i></button></li>
                      </ul>
                      <div class="xem"><a href="#">Xem chi tiết</a></div>
                  </div>-->
                  <asp:Label ID="lbTongThanhTien" runat="server"></asp:Label>
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
     <li><a href="Default.php">Trang Chủ</a></li>
      <li><a href="GioiThieu.php">Giới thiệu</a></li>
      <li><a href="#">Cây cảnh</a>
        <ul class="submenu">

                    <li style="text-align: left; padding-left: 40px">
                        <asp:HyperLink ID="DanhMucSP" runat="server" Text='<%# Eval("TenLoaiSP") %>' NavigateUrl='<%# "TheLoaiSanPham.html/?MaLoaiSP="+ Eval("MaLoaiSP") %>' CssClass="TenDSSP"></asp:HyperLink></li>
                    <br />
                   
          
        </ul>
      </li>
      
      <li><a href="TinTuc.php">Blog - Tin tức</a></li>
      <li class="auto-style12"><a href="HoTroLienHe.php">Hỗ trợ - Liên hệ</a></li>
        
        
        
        </ul>
    
    
  </div>
            
  <div class="container content">
      
    <div class="leftmain">
        
        
            <div class="Danhsach">
                <div class="tieude">
                    <button class="dropdown-btn">
                        <i class="fa fa-bars" aria-hidden="true"></i>Danh mục sản phẩm
                    </button>
                </div>
                <div class="danhmuc">
                    <div class="dropdown-container">
                        <div ID="Danhmuc">
                            
                                
                                <?php
                                
                                $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                                $sql1="sELECT  * from loaisanpham";
                                mysqli_query($connection,"set names 'utf8'");
                                $query1=mysqli_query($connection,$sql1);
                            echo "<table style='color:#4B4B4B;font-weight:normal;font-style:normal;text-decoration:none;width:245px;border-collapse:collapse;font-family: Tahoma, Geneva, sans-serif;'>";
                            $i=1;
                            while($data1= mysqli_fetch_array($query1))
                            {
                                echo "<tr>";
                                $link1="?MaLoaiSP=".$data1['MaLoaiSP'];
                                $i++;
                                if($i%2==0)
                                {
                                    echo "<td style='list-style-type: none;background-color:#BADE8F;";
                                }
                                else echo "<td style='list-style-type: none;background-color:White;";
                                
                                echo "height:40px'><a ID='DanhMucSP'  href='TheLoaiSanPham.php$link1' style=' margin:20px;' class='TenDSSP'>"; 
                                echo $data1['TenLoaiSP'];
                                echo "</a></td></tr>";
                                
                                
                            }
                            echo "</table>";
                            ?>
                                
                                
                            </div>
                    </div>
                </div>
            </div>
            <div class="Danhsacha">
                <div class="tieude">
                    <i class="fa fa-bars" aria-hidden="true"></i><span>Tin tức mới nhất</span></div	>
                <div class="tintuc">
                <?php
                    $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                    $sql5="sELECT  MaBlog, HinhAnh, NgayDang,TieuDe, TTND FROM BLOG order by NgayDang desc limit 2;";
                    mysqli_query($connection,"set names 'utf8'");
                    $query5=mysqli_query($connection,$sql5);
                    
                    echo "<table style='border-collapse:collapse;'>";
                    
                    while($data5= mysqli_fetch_array($query5))
                    {
                        
                        echo "<tr ><td><div class='auto-style43'><div>";     
  
                                $link_anh2="Anh/Blog/".$data5['HinhAnh']; 
                                $link2="?MaSP=".$data5['MaBlog'];
                                ?>
                                
                                        <a href='ChiTietTinTuc.php><?php echo $link2; ?>'><img class='anh' src='<?php echo $link_anh2?>' style="height:151px;width:216px;margin-right: 0" ></a>
                                    </div>
                                <div class="kc"><strong>
                                    
                                        <a  class="Link" href='ChiTietSanPham.php<?php echo $link2;?>'  style="color: #009900"><?php echo $data5['TieuDe']; ?></a>
                                        </strong>
                                    </div>
                                <div class="kc">
                                <a href='ChiTietTinTuc.php<?php echo $link2; ?>' style="text-decoration:none;color: #999999; font-size: small" ><?php echo $data5['TTND']; ?></a>
                                 </div>
                                 </div></br></td>       
                                </tr>
                               
                        
                              <?php  
                    }
                   
                    echo "</table>";
                    mysqli_close($connection);
                ?>
                </div>
            </div>
       
        
    </div>
    <div class="rightmain">
        <form action="XuLy/XuLyDangKy.php">
  <table style="width:100%;">
    <tr>
        <td class="phantrang" colspan="2" style="font-size: xx-large"><strong>Đăng Ký</strong></td>
    </tr>
    <tr>
        <td class="auto-style6" style="width: 387px; text-align: right; height: 49px"><strong>&nbsp;Thông tin tài khoản</strong></td>
        <td style="height: 49px">

        </td>
    </tr>
    <tr>
        <td class="auto-style6" style="width: 387px; text-align: right; height: 49px"><strong>Tài Khoản:</strong></td>
        <td style="height: 49px">
       	 <input type="text" id="txtUsername" name="Username" class="input"   >
        </td>
    </tr>
    <tr>
        <td class="auto-style6" style="width: 387px; text-align: right; height: 48px"><strong>Mật Khẩu: </strong></td>
        <td style="height: 48px">
            <input type="password" id="txtPassword" name="Password" class="input"    >
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 48px"><strong>Nhập lại mật khẩu</strong></td>
        <td style="height: 48px">
            <input type="password" id="txtRePassword" name="RePassword" class="input"    >
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 48px"><strong>Thông tin khách hàng</strong></td>
        <td style="height: 48px">&nbsp;
            </td>
    </tr>
    <tr>
        <td  style="width: 387px; text-align: right; height: 48px"><strong>Họ Tên:</strong></td>
        <td style="height: 48px">
            <input type="text" id="txtTenKH" name="TenKH" class="input"   >
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 48px"><strong>Email:</strong></td>
        <td style="height: 48px">
            <input type="email" id="txtEmail" name="Email" class="input"   >
        </td>
    </tr>
    <tr>
        <td  style="width: 387px; text-align: right; height: 48px"><strong>Địa Chỉ:</strong></td>
        <td style="height: 48px">
            <textarea  id="txtDiaChi" name="DiaChi" class="input"   ></textarea>
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 48px"><strong>SDT:</strong></td>
        <td style="height: 48px">
            <input type="number" id="txtSDT" name="SDT" class="input"   >
        </td>
    </tr>
    <tr>
        <td  style="width: 387px; text-align: right; height: 61px">&nbsp;</td>
        <td class="kc" style="height: 61px">
            <input type="submit" name="btnDK" class="btnDat" id="btnDK" value="Đăng ký" />
        </td>
    </tr>
    <tr>
        <td style="width: 387px; text-align: right; height: 61px"></td>
        <td class="kc" style="height: 61px">
        </td>
    </tr>
</table>
<div align="center" class="result"></div>
</form>
    </div>
  </div>
  <div class="footer"> 
      <table class="auto-style14">
          <tr>
              <td class="auto-style40">Địa chỉ: Đường Lê Chí Dân, phường Tương Bình Hiệp, TP. Thủ Dầu Một, Tỉnh Bình Dương webcaycanh@gmail.com</td>
          </tr>
          <tr>

              <td class="auto-style42">SĐT: 0903000063</td>
          </tr>
          <tr>
              
              <td class="auto-style39">
                  
                  <asp:Label ID="lbDangOnline" runat="server"></asp:Label>
                  
                  <br />Copyright @ 2020 @ by TTT . All right reserved.</td>
          </tr>
      </table>
            </div>
</div>
        
    </form>
   
</body>
</html>
