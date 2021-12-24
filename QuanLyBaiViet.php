<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
    $conn = mysqli_connect("localhost","root","","webcaycanh");
    $result = mysqli_query($conn, 'select count(MaBlog) as total from blog where MaTK='.$matk);
    mysqli_query($conn,"set names 'utf8'");
    $data = mysqli_fetch_assoc($result);
    $total_records = $data['total'];
    
   
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    
    
    $start = ($current_page - 1) * $limit;
    
    
    $result = mysqli_query($conn, "SELECT BLOG.MaBlog, BLOG.HinhAnh, BLOG.TieuDe, BLOG.TTND, BLOG.NoiDung, BLOG.SoLanXem, BLOG.NgayDang, TaiKhoan.TenTK FROM BLOG INNER JOIN TaiKhoan ON BLOG.MaTK = TaiKhoan.MaTK where taikhoan.matk=" .$matk."  order by MaBlog asc LIMIT $start , $limit ");
    mysqli_query($conn,"set names 'utf8'");
?>
  <?php include_once("Trenql.php"); ?>
    <div class="rightmain" style="height:900px">

    <table style="width: 100%;">
    <tr>
        <td class="phantrang" colspan="2" style="font-size: xx-large"><strong>DANH SÁCH BLOG</strong></td>
    </tr>
    <tr>
        <td style="width: 115px"></td>
        <td>
                <a href="KHThemBlog.php" class="btnDat">Thêm bài viết mới</a>
                <br />
                <br />
                <br />
         </td>
    </tr>
    <?php
        if($result!=false)
        {
    ?>
    <table border="2" style="text-align: center;margin: 0 auto;">
            <tr>
            	<th width="127.15" style="background-color: #006699; color: White">Mã Blog</th>
                <th width="127.15" style="background-color: #006699; color: White">Tiêu Đề</th>
                <th width="127.15" style="background-color: #006699; color: White">Tóm Tắt Nội Dung</th>
                <th width="127.15" style="background-color: #006699; color: White">Ngày Đăng</th>
                <th width="127.15" style="background-color: #006699; color: White">Sửa</th>
                <th width="127.15" style="background-color: #006699; color: White">Xóa</th>
            </tr>
    <?php
        
        
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $maBlog=$row["MaBlog"];
            $tieuDe=$row["TieuDe"];
            $tomTatND=$row["TTND"];
            $ngayDang=$row["NgayDang"];

            $link4="?thamso=xuat_blog&id=".$row['MaBlog'];
            $link5="?thamso=xoa_blog&id=".$row['MaBlog'];
    ?>
            <tr>
                <td style="text-align: center; color:#000066">
                     <?php
                        echo($maBlog);
                     ?>
                </td>
                <td>
                     <?php
                        echo($tieuDe);
                     ?>
                </td>
                <td>
                     <div class="gvBlog">   
                     <?php
                        echo($tomTatND);
                     ?>
                     </div>
                </td>
                <td>
                    <div class="gvBlog">   
                     <?php
                        echo($ngayDang);
                     ?>
                     </div>
                </td>
                <td style="text-align: center">
                    <a href='KHSuaBlog.php<?php echo $link4; ?>'><img src='Anh/Icon/Edit.png'></a>
                </td>
                <td style="text-align: center">
                    <a href="XuLy/XuLyXoaBlog.php<?php echo $link5; ?>"> <img src='Anh/Icon/Delete.jpg'></a>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <?php
    }
    mysqli_close($conn);
    ?>
    
</table>

        <td>
        	<div class="result" style="text-align:center"></div>
        </td>
        <div class="phantrang">
                     </br>
                 <?php 
                   
                     if ($current_page > 1 && $total_page > 1){
                         echo '<a class="btnDat" href="QuanLyBaiViet.php?page='.($current_page-1).'">Prev</a></button>';
                     }
                     if($total_page>1)
                     {
                        for ($i = 1; $i <= $total_page; $i++){

                            if ($i == $current_page){
                                echo '<span class="btnpt" style="color: red;">'.$i.'</span>';
                            }
                            else{
                                echo '<a class="btnpt" style="color: green;" href="QuanLyBaiViet.php?page='.$i.'">'.$i.'</a>';
                            }
                        }
                     }

                     if ($current_page < $total_page && $total_page > 1){
                         echo '<a  class="btnDat" href="QuanLyBaiViet.php?page='.($current_page+1).'">Next</a> ';
                     }
                     
                 ?>
                 
                 </div>
                 <br>
   
    </div>
      
    
  </div>
  <form>
  <?php include_once("Duoi.php"); ?>