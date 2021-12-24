<?php include_once("Tren.php"); ?>
<div class="rightmain">

        <div class="Danhsachsp">
            Danh sách sản phẩm</div>
             <?php 
        $conn = mysqli_connect("localhost","root","","webcaycanh");

        
        $tenSP = $_REQUEST["txtTenSP"];
        
		
        
         /*
         
        $result = mysqli_query($conn, "sELECT count(masp) as total from sanpham Where tensp like '%".$tenSP."%'");
        mysqli_query($conn,"set names 'utf8'");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
         
   
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
         

        $total_page = ceil($total_records / $limit);
         
       
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
         
       
        $start = ($current_page - 1) * $limit;
        
        
        
       $result = mysqli_query($conn, "sELECT * from sanpham Where tensp like '%".$tenSP."%' LIMIT $start , $limit");
        mysqli_query($conn,"set names 'utf8'");
                  */  
                  mysqli_query($conn,"set names 'utf8'");
        $result = mysqli_query($conn, "sELECT * from sanpham Where tensp like '%".$tenSP."%'");
        
                    
            
        if($result != false)
        {
            if(mysqli_num_rows($result)>0)
            {
               
                echo ("Kết quả tìm kiếm: " . $tenSP);
                    echo "<table style='width:997px;border-collapse:collapse;' >";
                    while($row= mysqli_fetch_assoc($result))
                    {
                        
                        echo "<tr>";
                        for($i=1;$i<=3;$i++)
                        {
                            echo "<td>";
                            if($row!=false)
                            {
                                echo "<div class='blognd' style='width: 321px'><table class='auto-style3' ><tr>";

                                $link_anh="Anh/CayCanh/".$row['HinhAnh']; 
                                
                                $link="?thamso=xuat_san_pham&id=".$row['MaSP'];
                                ?>

                                <td class="auto-style7" rowspan="3">
                                    <a href='ChiTietSanPham.php<?php  echo $link; ?>'><img class='anh' src='<?php echo $link_anh?>' style='height:207px;width:170px;' ></a>
                                </td>
                                <td class="auto-style12" >
                                        <strong><a ID="TenSP" class="tenSP" href='ChiTietSanPham.php<?php echo $link;?>'  Width='139px'><?php echo $row['TenSP']; ?></a></strong>
                                </td></tr>
                                <tr>
                                <td><span class="auto-style5"><strong>Giá:</strong></span><span class="auto-style11" style="color: #FF0000"> <?php echo $row['TienSP']; ?></span></td></tr>
                                <tr><td class="auto-style10">
                                <form  id='form3' method='get' action='GioHang.php'>
                        <input type='hidden' name='thamso' value='xuat_gio_hang' >
                        <input type='hidden' name='id' value="<?php echo $row['MaSP']; ?>" > 
                        <input type='hidden' name='so_luong' value='1' style='width:100px;height:40px' > 
                       <input  class='btnDat' type='submit' value='Đặt Hàng' style='margin-left:15px' >
                    </form>
                                </td>
                                </tr>
                                </table>
                                <?php
                                echo "</div>";
                            }
                            
                            echo "</td>";
                            if($i!=3)
                            {
                                $row= mysqli_fetch_assoc($result);
                            }
                            
                        }
                        
                        
                       echo "</tr>";
                       
                    }
                   
                    echo "</table>";
                    mysqli_close($conn);
            } 

            else echo("Không tìm thấy sản phẩm với tên: " . $tenSP);
        }
                
                ?>
           <div class="phantrang">
            </br>
           <?php 
           /*  
            if ($current_page > 1 && $total_page > 1){
                echo '<a class="btnDat" href="TimKiem.php?page='.($current_page-1).'">Prev</a></button>';
            }
            for ($i = 1; $i <= $total_page; $i++){

                if ($i == $current_page){
                    echo '<span class="btnpt" style="color: red;">'.$i.'</span>';
                }
                else{
                    echo '<a class="btnpt" style="color: green;" href="TimKiem.php?page='.$i.'">'.$i.'</a>';
                }
            }

            if ($current_page < $total_page && $total_page > 1){
               
                echo '<a  class="btnDat" href="TimKiem.php?page='.($current_page+1).'">Next</a> ';
            }
           
           
            
          */
           ?>
           
        </div>
        </br>
        </div>
        </div>
    </div>
<?php include_once("Duoi.php"); ?>