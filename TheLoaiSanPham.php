
<?php include_once("Tren.php");
$_SESSION['trang_chi_tiet_gio_hang']="co";
?>
    <div class="rightmain">
        <div class="sphot">
        
        <div class="Danhsachsp">
            
        <?php
        $MaLSP=$_GET['id'];
        $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
        $sql2="sELECT * FROM loaisanpham WHERE MaLoaiSP='".$MaLSP."'";
        mysqli_query($connection,"set names 'utf8'");
        $query1=mysqli_query($connection,$sql2);
           while($data= mysqli_fetch_array($query1))
           {
               echo $data['TenLoaiSP'];
               
           }
           echo "</div>";
            

            
                    
                    

                    $sql3="sELECT * FROM LOAISANPHAM INNER JOIN SANPHAM ON LOAISANPHAM.MaLoaiSP = SANPHAM.MaLoaiSP  where LOAISANPHAM.MaLoaiSP= ".$MaLSP." order by Sanpham.MaSP asc";
                    mysqli_query($connection,"set names 'utf8'");
                    $query=mysqli_query($connection,$sql3);
                    
                   
                    echo "<table style='width:997px;border-collapse:collapse;' >";
                    
            
                    while($data= mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        for($i=1;$i<=3;$i++)
                        {
                            echo "<td>";
                            if($data!=false)
                            {
                                echo "<div class='blognd' style='width: 321px'><table class='auto-style3' ><tr >";

                            $link_anh="Anh/CayCanh/".$data['HinhAnh']; 
                            
                            $link="?thamso=xuat_san_pham&id=".$data['MaSP'];
                            ?>

                            <td class="auto-style7" rowspan="3">
                                <a href='ChiTietSanPham.php<?php  echo $link; ?>'><img class='anh' src='<?php echo $link_anh?>' style='height:207px;width:170px;' ></a>
                            </td>
                            <td class="auto-style12" >
                                    <strong><a ID="TenSP" class="tenSP" href='ChiTietSanPham.php<?php echo $link;?>'  Width='139px'><?php echo $data['TenSP']; ?></a></strong>
                            </td></tr>
                            <tr>
                            <td><span class="auto-style5"><strong>Giá:</strong></span><span class="auto-style11" style="color: #FF0000"> <?php echo $data['TienSP']; ?></span></td></tr>
                            <tr><td class="auto-style10">
                                <br>
                    <br>

                    <form  id='form3' method='get' action='GioHang.php'>
                        <input type='hidden' name='thamso' value='xuat_gio_hang' >
                        <input type='hidden' name='id' value="<?php echo $data['MaSP']; ?>" > 
                        <input type='hidden' name='so_luong' value='1' style='width:100px;height:40px' > 
                       <input  class='btnDat' type='submit' value='Đặt Hàng' style='margin-left:15px' >
                    </form>
                                </td>
                            </tr>
                            </table>
                            <?php
                            }
                            
                            echo "</div></td>";
                            if($i!=3)
                            {
                                $data= mysqli_fetch_array($query);
                            }
                            
                        }
                        
                        
                       echo "</tr>";
                    }
                   
                    echo "</table>";
                    mysqli_close($connection);
                ?>
            </div>

    
      
    </div>
  </div>
  <?php include_once("Duoi.php"); ?>