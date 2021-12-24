
<?php include_once("Tren.php"); 
include("DataProvider.php");
?>
    <div class="rightmain">
            <div class="sphot">
        

 <?php

    $MaBlog1=$_GET['id'];
    
	$connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
	mysqli_query($connection,'set character set "utf8"'); 
    $dsBlog = mysqli_query($connection,"select * from blog where MaBlog='".$MaBlog1."'");
	$row = mysqli_fetch_array($dsBlog,MYSQLI_ASSOC);
    $link_anh="Anh/Blog/".$row['HinhAnh'];
	$link="?thamso=xuat_san_pham&id=".$row['MaBlog'];
	?>
    <div class="Danhsachsp">
    <?php
        
			echo $row['TieuDe'];
	?>
    </div>
        <div class="ndtintuc">
            <table style="width:100%;">
                <tr>
                    <td class="auto-style1" width='400px' height='200px' align='center' >
                    <?php
                        echo "<img width='400px' height='200px' src='$link_anh'>";
					?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br />
                        <p align="center" style="font-size: 30px; color:#009">
                    		<?php
							echo $row['TieuDe'];
							?></p>
                        <br />
                    </td>
                </tr>
                <tr>
                	<td>
                    <p><?php
							echo nl2br($row['NoiDung']);
					?></p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="Danhsachsp" >
    		<p>Bình Luận</p>
    	</div>
        	<p class="ndcm">Nội Dung</p>
            <form name="form4" method="post"> 
                <table>
                <tr>
                    <td><textarea  class="ndtext" id="tbND" name="tbND" style="width: 465px; height: 100px" value="" ></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" ID="btnBL" name="btnBL" Class="btnDat" value="Bình Luận" /></td>
                
                </tr>
                </table>
            </form>
            <?php	
			
             $dsCm="sELECT * FROM binhluanblog where MaBlog='".$MaBlog1."'";
                    mysqli_query($connection,"set names 'utf8'");
                    $query=mysqli_query($connection,$dsCm);
					while($data= mysqli_fetch_array($query))
                    {
						$MaBLB=$data["MaBLB"];
						$MaTK = $data["MaTK"];
                        $MaBlog=$data["MaBlog"];
						$NgayBL=$data["NgayBL"];
                        echo "<tr>";
                        for($i=1;$i<=3;$i++)
                        {
                            echo "<td>";
                            if($data!=false)
                            {	
					?>
   
             <table class="bangbl" style="width:100%;">
         
                <tr class"dongbl">
                    <td width="15%"  class"hangbl" >
                    <p style="color: #3333CC"><?php
								$dsTK = DataProvider::ExecuteQuery("SELECT * From taikhoan ");
								if($dsTK!=false){
									if(mysqli_num_rows($dsTK)>0){
									while($row = mysqli_fetch_array($dsTK)){
										$TenKH1 = $row["TenTK"];
										$MaTK1=$row["MaTK"];
								
										if($MaTK==$MaTK1){
											echo($TenKH1);
										}	
									}
								}
								}
					?></p>
                    </td>
                     <td width="85%"  class"hangbl" >
                     <span style="font-size: xx-small">đã bình luận ngày</span> 
                     <span style="font-size: xx-small; color: #000000">
						<?php
						echo $data['NgayBL'];
						?>
                       </span>
                    </td>
                    
                </tr>
                <tr class"dongbl" >
                    <td height="54"  colspan="2" class"hangbl" >
                    <span>
					<?php
						echo $data['NoiDungBL'];
						?></span>
                    </td>
               </tr>
                
            </table>	
					 <?php
                            }
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
  <?php
	if(isset($_REQUEST["btnBL"]))
	{
		$today = date('Y/m/d H:i:s');
		$flag=0;
		include_once("DataProvider.php");
		$sql = "Insert into binhluanblog (MaBlog,MaTK,NgayBL,NoiDungBL ) values (";
		$sql .= $MaBlog1.",";
		$sql .= $matk.",";
		$sql .="'".$today."',";   
		$sql .="'" .$_REQUEST["tbND"]."')";
		DataProvider::ExecuteQuery($sql);
		
		$maBL = -1;
		$sql = "select max(MaBLB) From binhluanblog";
		$result = DataProvider::ExecuteQuery($sql);
		if($result!=false)
		{
			$row = mysqli_fetch_array($result);
			$maBL = $row["max(MaBLB)"];
			$flag=1;
		}
		 if($flag==1)
    	{
        ?>
        	<script> window.location.href = "/WebCayCanh/ChiTietBlog.php?<?php echo $link; ?>";</script>
        <?php
    	}	
	}
	?>
<style>
.hangbl{
 margin-top:20px;
}
.bangbl{
	padding: 10px;
	margin-top: 20px;
	border-radius: 5px;
    background-color: #eff1f3;
    border-style: solid;
    border-color: rgba(0, 0, 0, 0.19);
}
.ndtext{
	margin-left:10px;
	margin-top:10px;
}
.ndcm{
	margin-left:10px;
	margin-top:10px;
	font-weight:bold;
	font-size: 18px;
}
.btnDat {
	margin-left:10px;
	margin-top:10px;
    outline: none;
    border-color: #28a745;
    border-style: solid;
    padding: 10px;
    height: 40px;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    background-color: #28a745;
    cursor: pointer;
    text-decoration:none;
    list-style:none;
    
}
</style>	      

    </div>
  </div>


  <?php include_once("Duoi.php"); ?>    
