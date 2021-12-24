<?php 
    include_once("Tren.php"); 
    
    

if(empty($_SESSION['MaTK']))
{
    echo '<script type="text/javascript">
    alert("Vui lòng đăng nhập");
           window.location = "DangNhap.php"
      </script>';
     
    exit;  
}
?>
<div class="rightmain">
    <?php 
    $connection = mysqli_connect("localhost","root","","webcaycanh") ;
		mysqli_query($connection,"set names 'utf8'");
       
    
    if(isset($_REQUEST['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co")
    {
        
        $_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
        if(isset($_SESSION['id_them_vao_gio']))
        {
            $so=count($_SESSION['id_them_vao_gio']);
            $trung_lap="khong";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                if($_SESSION['id_them_vao_gio'][$i]==$_REQUEST['id'])
                {
                    $trung_lap="co";
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }
            if($trung_lap=="khong")
            {
                $_SESSION['id_them_vao_gio'][$so]=$_REQUEST['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_REQUEST['so_luong'];
            }
            if($trung_lap=="co")
            {
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
            }
        }
        else
        {
            $_SESSION['id_them_vao_gio'][0]=$_REQUEST['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_REQUEST['so_luong'];
        }
    }

    $gio_hang="khong";
    
    if(isset($_SESSION['id_them_vao_gio']))
    {
        $so_luong=0;
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            $so_luong=$so_luong+ $_SESSION['sl_them_vao_gio'][$i];
        }
        if($so_luong!=0)
        {
            $gio_hang="co";
        }
    }
    
    echo "<h1 style='font-weight:bold' align='center'>Thông Tin Giỏ Hàng</h1>";
    echo "<br>";
    echo "<br>";
    if($gio_hang=="khong")
    {
        echo "Không có sản phẩm trong giỏ hàng";
        
    }
    else
    {
        echo "<form action='' method='post' >";
    echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
    
        echo "<table id='customers'>";
            echo "<tr>";
                echo "<th  >Tên</th>";
                
                echo "<th >Đơn giá</th>";
                echo "<th  >Thành tiền</th>";
                echo "<th  >Số lượng</th>";
                
            echo "</tr>";
            $tong_cong=0;
            
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                
                $tv="select * from sanpham where masp='".$_SESSION['id_them_vao_gio'][$i]."'";
                $tv_1=mysqli_query($connection,$tv);
                $tv_2=mysqli_fetch_array($tv_1);
              
                $tien=$tv_2['TienSP']*$_SESSION['sl_them_vao_gio'][$i];
                $tong_cong=$tong_cong+$tien;
                if($_SESSION['sl_them_vao_gio'][$i]!=0)
                {
                    $name_id="id_".$i;
                    $name_sl="sl_".$i;
                echo "<tr>";
                    echo "<td>".$tv_2['TenSP']."</td>";
                    
                    echo "<td>".$tv_2['TienSP']."</td>";
                    echo "<td>".$tien."</td>";
                    echo "<td>".$_SESSION['sl_them_vao_gio'][$i]."</td>";
                    
                                                               
                     
                echo "</tr>";
                }
            }          
           
            echo "</table>";
            echo "</form>";
            echo "<br>";
            echo "<p style='font-weight:bold' align='right'>Tổng giá trị đơn hàng là : ".$tong_cong." VNĐ&nbsp;&nbsp;</p> ";
         ?>
         
         <h2 style='font-weight:bold;margin-left:20px;margin-top:100px;margin-bottom:50px' align='left'>Thông Tin Giao Hàng</h2>
         <?php
         include("DataProvider.php");
                                    $SP = DataProvider::ExecuteQuery("sELECT * From TaiKhoan where MaTK=".$_SESSION['MaTK']);
                                    
                                        if(mysqli_num_rows($SP)>0)
                                        {
                                            $row = mysqli_fetch_array($SP);
                                            $tenKH=$row["TenTK"];
                                            $dc=$row["DiaChi"];
                                            $sdt=$row["SDT"];
                                        }
                                        ?>
    <form name="form5" method="post"> 
         <table id='customerss' >
        <tr>
            <th>Tên Khách Hàng</th>
            <td><input type="text" name="tenkh" value="<?php echo ($tenKH) ?>" class="search2"></td>
    </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><input type="text" name="diachi" value="<?php echo ($dc) ?>" class="search2"></td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td><input type="text" name="sodt" value="<?php echo ($sdt) ?>" class="search2"></td>
        </tr>
        <tr>
            <th>Hình Thức Thanh Toán</th>
            <td><select name="httt" class="search2" id="httt">
                <option value="Thanh Toán Trực Tiếp">Thanh Toán Trực Tiếp</option>
                <option value="Thanh Toán Bằng Thẻ">Thanh Toán Bằng Thẻ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td ></br><input type="submit" ID="bntThanhToan" name="bntThanhToan" class="btnThanhToan" value="Thanh Toán" /></br></br></td>
        </tr>
        
    </table>
    </form>

   <?php
        }
?>
    
</div>

</div>
<?php include_once("Duoi.php"); ?>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  text-align: center;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
 
  background-color: #006699;
  color: white;
}
#customerss {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: auto;
  margin-right: auto;
  
}


#customerss td, #customerss th {
  border: 1px solid #ddd;
  text-align: left;
  padding: 8px;
}

#customerss tr:nth-child(even){background-color: #f2f2f2;}

#customerss tr:hover {background-color: #ddd;}

#customerss th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #006699;
  color: white;
}

.search2  {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    height: 45px;
    float: left;
    width: 100%;

}
.btnThanhToan {
    outline: none;
    border-color: #006699;
    border-style: solid;
    padding: 10px;
    height: 40px;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    background-color: #006699;
    cursor: pointer;
    text-decoration:none;
    list-style:none;
}
</style>
<?php
if(isset($_REQUEST["bntThanhToan"]))
{
    $flag=0;
    $today = date("Y/m/d ");
	include_once("DataProvider.php");
    
    $matkk=$_SESSION['MaTK'];
    
    if(!empty($_POST['httt'])) {
        $selected = $_POST['httt'];
        
    } 
    else $selected="Thanh Toán Bằng Thẻ";
    
    
    $connection = mysqli_connect("localhost","root","","webcaycanh") ;
		mysqli_query($connection,"set names 'utf8'");
	$sqlthem = "iNSERT INTO donhang( MaTK, NgayLapDH, TenKH, DiaChi, SDT, PTTT, TrinhTrang, ThanhTien) VALUES (".$matkk.",'".$today."','".$_REQUEST['tenkh']."','".$_REQUEST['diachi']."','".$_REQUEST['sodt']."','".$selected."','Đang Chờ Xử Lý',".$tong_cong.")";
        
         
        
        
            
    
            if($connection->query($sqlthem) == TRUE)
            {
                $flag=1;
                $sql2 = "sELECT Max(MaDH) as madh from DonHang ";
                $result = mysqli_query($connection, $sql2);
                $row = mysqli_fetch_assoc($result);
                

                $SoDonHang = $row['madh'];
                    
                for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                {
                $masp=$_SESSION['id_them_vao_gio'][$i];
                $sl=$_SESSION['sl_them_vao_gio'][$i];

                $sql4 = "iNSERT INTO ChiTietDonHang (madh,masp,sl) VALUES (".$SoDonHang.",".$masp.",".$sl.")";
                
                DataProvider::ExecuteQuery($sql4);
                DataProvider::ExecuteQuery("update sanpham set soluongsp=soluongsp-".$sl.",soluongban=soluongban+".$sl." where masp=".$masp.";");
                }
                unset($_SESSION['id_them_vao_gio']);
                unset($_SESSION['sl_them_vao_gio']);
            }
            else
            {
                
                echo '<script type="text/javascript">
                alert("Đặt Hàng Không Thành Công");
                       window.location = "GioHang.php"
                  </script>';
                 
                exit;  
            }
            if($flag==1)
            {
                echo '<script type="text/javascript">
                alert("Đặt Hàng Thành Công");
                       window.location = "Default.php"
                  </script>';
                 
                exit;  
            }
            mysqli_close($connection);
            
     
}
?>