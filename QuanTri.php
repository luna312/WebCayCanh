<?php
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
    <form id="form1" >
        
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
            <?php
             
             $conn = mysqli_connect("localhost","root","","webcaycanh");
     
             
             $result = mysqli_query($conn, 'select count(MaSP) as total from SanPham');
             mysqli_query($conn,"set names 'utf8'");
             $data = mysqli_fetch_assoc($result);
             $total_records = $data['total'];
             
            
             $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
             $limit = 15;

             $total_page = ceil($total_records / $limit);

             if ($current_page > $total_page){
                 $current_page = $total_page;
             }
             else if ($current_page < 1){
                 $current_page = 1;
             }
             
             
             $start = ($current_page - 1) * $limit;
             
             
             $result = mysqli_query($conn, "sELECT * from SanPham order by MaSP asc LIMIT $start , $limit");
             mysqli_query($conn,"set names 'utf8'");
             
              if($result!=false)
              {
                 
                 ?>
                 <table style="margin: 0 auto;" >
                                 <tr>
                                     <td class="text-center">
                                         <h1><strong>DANH SÁCH SẢN PHẨM</strong></h1>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         &nbsp;&nbsp;&nbsp;&nbsp;
                                         <a href='ThemSP.php' ID="btnThem" Class="btnDat" >Thêm Mới</a>
                                         <br />
                                         <br />
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <div class="text-center" >
                                             <table border="2" >
                                             <tr>
                                                 <th width="50" height="35" style="text-align:center; background-color: #006699; color: White">Mã SP</th>
                                                 <th width="400" style="text-align:center; background-color: #006699; color: White">Tên SP</th>
                                                 <th width="200" style="text-align:center; background-color: #006699; color: White">Đơn giá</th>
                                                 <th width="100" style="text-align:center; background-color: #006699; color: White">Ngày cập nhật</th>
                                                 <th width="200" style="text-align:center; background-color: #006699; color: White">Số lượng bán</th>
                                                 <th width="100" style="text-align:center; background-color: #006699; color: White">Số lượt xem</th>
                                                 <th width="100" style="text-align:center; background-color: #006699; color: White">Sửa</th>
                                                 <th width="100" style="text-align:center; background-color: #006699; color: White">Xóa</th>
                                             </tr>
                                             <?php
                                                 while($row = mysqli_fetch_array($result))
                                                 {
                                                 $link="?id=".$row['MaSP'];
                                                 $MaSP = $row["MaSP"];
                                                 $TenSP = $row["TenSP"];
                                                 $DonGia = $row["TienSP"];
                                                 $NgayCapNhat=$row["NgayCapNhat"];
                                                 $SoLuongBan = $row["SoLuongBan"];
                                                 $SoLuotXem = $row["SoLanXem"];
                                                 ?>
                                                 <tr style="color:#000066;">
                                                     <td>
                                                         <?php
                                                             echo($MaSP);
                                                         ?>
                                                     </td>
                                                     <td>
                                                         <?php
                                                         echo($TenSP);
                                                         ?>
                                                     </td>
                                                     <td>                                                               
                                                         <?php echo($DonGia); ?>
                                                     </td>
                                                     <td>
                                                         <?php echo($NgayCapNhat); ?>
                                                     </td>
                                                     <td>
                                                          <?php echo($SoLuongBan); ?>
                                                     </td>
                                                     <td>
                                                          <?php echo($SoLuotXem); ?>
                                                     </td>
                                                     <td>
                                                         <a href="SuaSP.php<?php echo $link; ?>"><img src='Anh/Icon/Edit.png'></a>
                                                     </td>
                                                     <td>
                                                         <a href="XuLy/XuLyXoaSP.php<?php echo $link; ?>"> <img src='Anh/Icon/Delete.jpg'></a>
                                                        
                                                     </td>
                                                 </tr>
                                                 <?php
                                                     } // end while
                                                 ?>
                                         </table>
                                         </div>
                                     </td>
                                 </tr>
                        </table>
                 <?php
                        
                    }else{
                        echo 'Tải sản phẩm thất bại';
                        exit;
                    }
             
              mysqli_close($conn);
              ?>
              <div class="phantrang">
                     </br>
                 <?php 
                 
                     if ($current_page > 1 && $total_page > 1){
                         echo '<a class="btnDat" href="QuanTri.php?page='.($current_page-1).'">Prev</a></button>';
                     }
 			if($total_page>1)
			{
                    		 for ($i = 1; $i <= $total_page; $i++){

                        	 if ($i == $current_page){
                        	     echo '<span class="btnpt" style="color: red;">'.$i.'</span>';
                       		  }
                        	 else{
                            		 echo '<a class="btnpt" style="color: green;" href="QuanTri.php?page='.$i.'">'.$i.'</a>';
                         		}
                     		}
                   	  }
                     
                     if ($current_page < $total_page && $total_page > 1){
                         echo '<a  class="btnDat" href="QuanTri.php?page='.($current_page+1).'">Next</a> ';
                     }
                     
                 ?>
                 
                 </div>
                 <br>
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
