
<?php include_once("Tren.php");
include("DataProvider.php"); ?>
    <div class="rightmain">
        <div class="sphot">
        
        <div class="Danhsachsp">
			<p>Chuyên mục Blog-TinTức</p>
            <?php
             
             $conn = mysqli_connect("localhost","root","","webcaycanh");
      
             
             $result = mysqli_query($conn, 'select count(mablog) as total from blog');
             mysqli_query($conn,"set names 'utf8'");
             $data = mysqli_fetch_assoc($result);
             $total_records = $data['total'];
              
        
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
              
             
             $result = mysqli_query($conn, "sELECT * from blog order by Mablog desc LIMIT $start , $limit");
             mysqli_query($conn,"set names 'utf8'");
                         
           	echo "</div>";
           			
                    
                    
                    
                    
                   
                    echo "<table style='width:100%;border-collapse:collapse;' >";
                    
            
                    while($data= mysqli_fetch_assoc($result))
                    {
						$TenKH = $data["MaTK"];
                        echo "<tr>";
                        for($i=1;$i<=3;$i++)
                        {
                            echo "<td>";
                            if($data!=false)
                            {
                                echo "<div class='blognd' style='width: 321px'><table class='auto-style3' ><tr >";

                            $link_anh="Anh/Blog/".$data['HinhAnh']; 
                            
                            $link="?thamso=xuat_san_pham&id=".$data['MaBlog'];
                            ?>
							<tr>
                                <td class="auto-style7" >
                                    <a href='ChiTietBlog.php<?php  echo $link; ?>'><img align="middle" class='anh' src='<?php echo $link_anh?>' style='height:151px;width:100%;margin-right: 0' ></a>
                                </td>
                            </tr>
                            <tr>
                           
                                <td class="auto-style12" >
                                        <strong><a ID="TieuDe" class="TenSP" href='ChiTietBlog.php<?php echo $link;?>'  style="color: #009900"><?php echo $data['TieuDe']; ?></a></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="auto-style11" style="color: #999999; font-size: small"> <?php echo nl2br($data['TTND']); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="auto-style5"></span><span class="auto-style11"  style="font-size: x-small"> <?php echo $data['NgayDang']; ?></span>
                                </td>
                                <td><span class="auto-style5"></span><span class="auto-style11"  style="font-size: x-small"><?php
							$dsTK = DataProvider::ExecuteQuery("sELECT * From taikhoan ");
							if($dsTK!=false)
							{
								if(mysqli_num_rows($dsTK)>0)
								{
								?>
								<?php
									while($row = mysqli_fetch_array($dsTK))
									{
										$TenKH1 = $row["TenTK"];
										$MaTK=$row["MaTK"];
								?>
									<?php
										if($MaTK==$TenKH)
										{
											echo($TenKH1);
										}
									?>
								<?php	
									}
								?>
								<?php
								}
								}else{
								echo 'Tải loại sản phẩn thất bại';
								exit;
								}
								?></span>
                                </td>
                            </tr>
                            </table>
                            <?php
                            }
                            
                            echo "</div></td>";
                            if($i!=3)
                            {
                                $data= mysqli_fetch_assoc($result);
                            }
                            
                        }
                        
                        
                       echo "</tr>";
                    }
                   
                    echo "</table>";
                    mysqli_close($conn);
                ?>
                <div class="phantrang">
            </br>
           <?php 
           
            if ($current_page > 1 && $total_page > 1){
                echo '<a class="btnDat" href="TinTuc.php?page='.($current_page-1).'">Prev</a></button>';
            }

            for ($i = 1; $i <= $total_page; $i++){

                if ($i == $current_page){
                    echo '<span class="btnpt" style="color: red;">'.$i.'</span>';
                }
                else{
                    echo '<a class="btnpt" style="color: green;" href="TinTuc.php?page='.$i.'">'.$i.'</a>';
                }
            }
            
            
            if ($current_page < $total_page && $total_page > 1){
                echo '<a  class="btnDat" href="TinTuc.php?page='.($current_page+1).'">Next</a> ';
            }
            
           ?>
           
        </div>
            </div>
            </br>
    
      
    </div>
  </div>
  <?php include_once("Duoi.php"); ?>