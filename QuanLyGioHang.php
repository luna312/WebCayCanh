<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
	$sql = "Select * from donhang where matk=".$matk;
	$conn = mysqli_connect("localhost","root","","webcaycanh");
    $result = mysqli_query($conn, 'select count(MaDH) as total from DonHang where MaTK='.$matk);
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
    
    
    $result = mysqli_query($conn, "Select * from donhang where matk=".$matk."  order by MaDH asc LIMIT $start , $limit ");
    mysqli_query($conn,"set names 'utf8'");
?>
  <?php include_once("Trenql.php"); ?>
    <div class="rightmain" style="height:900px">
    <form name="form2" method="post" action="" onSubmit="return fcTest()">
     <table style="width: 100%;">
    <tr>
        <td class="phantrang" colspan="2" style="font-size: xx-large"><strong>DANH SÁCH ĐƠN HÀNG</strong></td>
    </tr>
    <td style="width: 441px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <?php
        if($result!=false)
        {
            
    ?>
    <table border="2" style="text-align: center;margin: 0 auto;">
            <tr>
            	<th width="50" style="background-color: #006699; color: White">Mã Đơn Hàng</th>
                <th width="127.15" style="background-color: #006699; color: White">Ngày Lập HĐ</th>
                <th width="127.15" style="background-color: #006699; color: White">Tên Khách Hàng</th>
                <th width="127.15" style="background-color: #006699; color: White">Địa Chỉ</th>
                <th width="127.15" style="background-color: #006699; color: White">SĐT</th> 
                <th width="127.15" style="background-color: #006699; color: White">Phương Thức Thanh Toán</th>
                <th width="127.15" style="background-color: #006699; color: White">Tình Trạng</th>
                <th width="127.15" style="background-color: #006699; color: White">Thành Tiền</th>
                <th width="127.15" style="background-color: #006699; color: White">Xem Chi Tiết</th>
            </tr>
    <?php
    
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $maDH=$row["MaDH"];
            $ngaylapHD=$row["NgayLapDH"];
            $tenKH=$row["TenKH"];
            $diaChi=$row["DiaChi"];
            $sDT=$row["SDT"];
            $PTTT=$row["PTTT"];
            $thanhTien=$row["ThanhTien"];
            $tinhtrang=$row["TrinhTrang"];

            $link="?thamso=xuat_chi_tiet&id=".$row['MaDH'];
    ?>
            <tr>
                <td style="text-align: center; color:#000066">
                     <?php
                        echo($maDH);
                     ?>
                </td>
                <td>
                     <?php
                        echo($ngaylapHD);
                     ?>
                </td>
                <td>
                     <?php
                        echo($tenKH);
                     ?>
                </td>
                <td>
                     <?php
                        echo($diaChi);
                     ?>
                </td>
                <td style="text-align: center">
                     <?php
                        echo($sDT);
                     ?>
                </td>
                <td>
                     <?php
                        echo($PTTT);
                     ?>
                </td>
                <td>
                     <?php
                        echo($tinhtrang);
                     ?>
                </td>
                <td>
                     <?php
                        echo($thanhTien);
                     ?>
                </td>
                <td style="text-align: center">
                    <a href='ChiTietDonHang.php<?php echo $link; ?>'><img src='Anh/Icon/Edit.png'></a>
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
    <tr>
        <td style="width: 441px">&nbsp;</td>
        
    </tr>
</table>
    </form>
        <td>
        	<div class="result" style="text-align:center"></div>
        </td>
       
        <div class="phantrang">
                     </br>
                 <?php 
                   
                     if ($current_page > 1 && $total_page > 1){
                         echo '<a class="btnDat" href="QuanLyGioHang.php?page='.($current_page-1).'">Prev</a></button>';
                     }
                     if($total_page>1)
                     {
                        for ($i = 1; $i <= $total_page; $i++){

                            if ($i == $current_page){
                                echo '<span class="btnpt" style="color: red;">'.$i.'</span>';
                            }
                            else{
                                echo '<a class="btnpt" style="color: green;" href="QuanLyGioHang.php?page='.$i.'">'.$i.'</a>';
                            }
                        }
                     }

                     if ($current_page < $total_page && $total_page > 1){
                         echo '<a  class="btnDat" href="QuanLyGioHang.php?page='.($current_page+1).'">Next</a> ';
                     }
                     
                 ?>
                 
                 </div>
                 <br>
    </div>
      

  </div>
  <form>
  <?php include_once("Duoi.php"); ?>