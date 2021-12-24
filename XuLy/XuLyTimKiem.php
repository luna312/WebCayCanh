<?php

$connection = mysqli_connect("localhost","root","","webcaycanh") ;

if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_REQUEST["term"])){
    
    $sql = "sELECT * FROM Sanpham WHERE TenSP LIKE ?";
    mysqli_query($connection,"set names 'utf8'");
    if($stmt = mysqli_prepare($connection, $sql)){
        
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
       
        $param_term = $_REQUEST["term"].'%';

        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            
            if(mysqli_num_rows($result) > 0){
                
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" .$row["TenSP"] . "</p>";
                    
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($connection);
?>