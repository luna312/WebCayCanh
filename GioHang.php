<?php 
    include_once("Tren.php"); 
    

    ?>
     
      
     
<div class="rightmain">
    <?php 
    $connection = mysqli_connect("localhost","root","","webcaycanh") ;
		mysqli_query($connection,"set names 'utf8'");
        function trang_truoc(){
            ?>
                <html><head>
                  <meta charset="UTF-8">
                  <title>Đang chuyển về trang trước</title></head>
                <body>
                    <script type="text/javascript">
                        window.history.back();
                    </script>   
                </body>
                </html>
            <?php
    }
    
    if(isset($_POST['cap_nhat_gio_hang']))
    {
        include("XuLy/XuLyCapNhatGioHang.php");
        trang_truoc();
    }  
    
    
    
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
    
    echo "<h1 style='font-weight:bold' align='center'>Thông Tin Giỏ hàng</h1>";
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
                echo "<th ></th>";
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
                    echo "<td>";
                    echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
                    echo "<input type='number' min='0' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
                    echo "</td>";
                    echo "<td>";
                    
                    $link3="?id=".$_SESSION['id_them_vao_gio'][$i];
                    
                    
                    ?>
                    <a href="XuLy/XuLyXoaSPGH.php<?php echo $link3; ?>"> <img src='Anh/Icon/Delete.jpg'></a>

                    <?php
                    echo "</td>";
                                                               
                     
                echo "</tr>";
                }
            }          
            echo "<tr>";
            echo "<td>&nbsp;</td>";
            echo "<td>&nbsp;</td>";
            echo "<td>&nbsp;</td>";
            echo "<td><input class='btnDat' type='submit' value='Cập nhật' > </td>";
            ?>

            <td><a href="XuLy/XuLyDatHang.php" class='btnDat' value='Đặt Hàng'  >Đặt hàng</a></td>
            <?php
            echo "</tr>";
            echo "</table>";
            echo "</form>";
            echo "<br>";
            echo "<p style='font-weight:bold' align='right'>Tổng giá trị đơn hàng là : ".$tong_cong." VNĐ&nbsp;&nbsp;</p> ";
            
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
</style>