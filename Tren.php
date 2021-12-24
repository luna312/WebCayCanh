

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

</script> 


</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".resulttk");
        if(inputVal.length){
            $.get("XuLy/XuLyTimKiem.php", {term: inputVal}).done(function(data){
                
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    
    $(document).on("click", ".resulttk p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".resulttk").empty();
    });
});

</script>
<body>
        <?php 
         
         
         session_start();
        if(empty($_SESSION['MaTK'])) //  ko có tk
        {
            
            echo "<style>.lbTenDN{display:none } .hpDX{ display:none}</style>";
        }
        else //có tk
        {
            $matk=$_SESSION['MaTK'];
            $TenKH=$_SESSION['TenKH'];
            echo "<style>.lbTenDN{display:block} .hpDN { display:none} .hpDK{ display:none} </style>";
            
        }
          ?>
          
    <form id="form1" autocomplete="off" method="post" action="TimKiem.php">
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
                  <?php if(!empty($_SESSION['MaTK'])) echo $TenKH;?>
                  </a>
                  </span>
                  <span class="auto-style48">|</span><span class="auto-style44"><a href='XuLy/XulyDangXuat.php' class="hpDX" runat="server"   class="auto-style48">Đăng Xuất</a>
&nbsp;<a class="hpDK" runat="server"  href="DangKy.php"><span class="auto-style48">Đăng Kí</span></a>
                  </span>
                  </strong></td>
              
          </tr>
          <tr>
          <td class="search" style="width: 654px" >
                  
          
          <form name="form2" method="post" action="TimKiem.php">
            <div class="search-box">
                
                <input class="search" type="text" autocomplete="off"  placeholder="Tìm Tên Sản Phẩm..." name="txtTenSP" id="txtTenSP"/>
                
                <div class="resulttk"></div></div>
                </form>
        </td>
            
        
       
       
              
              
            
              <td class="giohang" ><a href="GioHang.php"><i class="fa fa-shopping-cart"></i><span class="auto-style11"><strong>Giỏ hàng</strong></span></a>
                 
                  <asp:Label ID="lbTongThanhTien" runat="server"></asp:Label>
              </td>
          </tr>
          <tr>
          
              <td class="auto-style10"></td>
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
        <?php
                                
                                $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                                $sql1="sELECT * from loaisanpham";
                                mysqli_query($connection,"set names 'utf8'");
                                $query1=mysqli_query($connection,$sql1);
                                while($data1= mysqli_fetch_array($query1))
                                {    
                                    $link="?thamso=xuat_loai_san_pham&id=".$data1['MaLoaiSP'];
                                    ?>
                                <li style="text-align: left; padding-left: 20px">
                                <a   href="TheLoaiSanPham.php<?php echo $link; ?>" class="TenDSSP"><?php echo $data1['TenLoaiSP']; ?></a></li>
                    <br />
                   <?php } ?>
          
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
                                  
                                  $link1="?thamso=xuat_loai_san_pham&id=".$data1['MaLoaiSP'];
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
                                  
                                  $link2="?thamso=xuat_chi_tiet_blog&id=".$data5['MaBlog'];
                                  ?>
                                  
                                          <a href='ChiTietBlog.php<?php echo $link2; ?>'><img class='anh' src='<?php echo $link_anh2?>' style="height:151px;width:216px;margin-right: 0" ></a>
                                      </div>
                                  <div class="kc"><strong>
                                      
                                          <a  class="Link" href='ChiTietBlog.php<?php echo $link2;?>'  style="color: #009900"><?php echo $data5['TieuDe']; ?></a>
                                          </strong>
                                      </div>
                                  <div class="kc">
                                  <a href='ChiTietBlog.php<?php echo $link2; ?>' style="text-decoration:none;color: #999999; font-size: small" ><?php echo $data5['TTND']; ?></a>
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