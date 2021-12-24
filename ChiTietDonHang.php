<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
    $MaDH=$_GET['id'];
    $sql = "SELECT SANPHAM.MaSP, SANPHAM.TenSP, SANPHAM.TienSP, ChiTietDonHang.SL, ChiTietDonHang.MaDH , SANPHAM.TienSP* ChiTietDonHang.SL AS ThanhTien FROM SANPHAM INNER JOIN ChiTietDonHang ON SANPHAM.MaSP = ChiTietDonHang.MaSP WHERE ChiTietDonHang.MaDH = ".$MaDH;

	$result = DataProvider::ExecuteQuery($sql);
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
            if(mysqli_num_rows($result)>0)
            {
    ?>
    <table border="2" style="text-align: center;margin: 0 auto;">
            <tr>
                <th width="127.15" style="background-color: #006699; color: White">Mã SP</th>
                <th width="127.15" style="background-color: #006699; color: White">Tên SP</th>
                <th width="127.15" style="background-color: #006699; color: White">Đơn Giá</th>
                <th width="127.15" style="background-color: #006699; color: White">Số Lượng</th>
                <th width="127.15" style="background-color: #006699; color: White">Thành Tiền</th>
            </tr>
    <?php
    
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $maSP=$row["MaSP"];
            $tenSP=$row["TenSP"];
            $soLuong=$row["SL"];
            $donGia=$row["TienSP"];
            $soLuong=$row["SL"];
            $thanhTien=$row["ThanhTien"];

            $link="?thamso=xuat_chi_tiet&id=".$row['MaDH'];
    ?>
            <tr>
                <td style="text-align: center">
                     <?php
                        echo($maSP);
                     ?>
                </td>
                <td>
                     <?php
                        echo($tenSP);
                     ?>
                </td>
                <td>
                     <?php
                        echo($donGia);
                     ?>
                </td>
                <td>
                     <?php
                        echo($soLuong);
                     ?>
                </td>
                <td>
                     <?php
                        echo($thanhTien);
                     ?>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <?php
        }
    }
    ?>
    <tr>
        <td style="width: 441px">&nbsp;</td>
        
    </tr>
</table>
    </form>
        <td>
        	<div class="result" style="text-align:center"></div>
        </td>
       
   
    </div>
      

  </div>
  <form>
  <?php include_once("Duoi.php"); ?>