<?php
session_start();
include("header.php"); //Developed by www.freestudentprojects.com
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        
        <div id="content" class="float_r">
        	<h1>Dealer Account</h1>

        <div class="cleaner"></div>
        <blockquote><?php         
$sql1 = "SELECT * FROM  dealer  where dealerid='$_SESSION[dealerlogid]'";
$seleditquery1 = mysqli_query($con,$sql1);
$rseditfetch1 = mysqli_fetch_array($seleditquery1);
echo "Welcome ".$rseditfetch1[fname] .  " " . $rseditfetch1[lname];
?>
        </blockquote>
                <div class="cleaner"></div>
        <blockquote> <strong>Last Login Date and Time:</strong> <?php echo $_SESSION[lastlogin]; ?></blockquote>
                <div class="cleaner"></div>
        <blockquote>
        <strong>Account details:</strong> <br>
<?php         
$sql2 = "SELECT * FROM  dealer  where dealerid='$_SESSION[dealerlogid]'";
$seleditquery2 = mysqli_query($con,$sql2);
$rseditfetch2 = mysqli_fetch_array($seleditquery2);
echo "Name:  ".$rseditfetch2[fname] .  " " . $rseditfetch2[lname]. "<br><br>";
echo "<strong>Address:</strong><br>  ".$rseditfetch2[address] ;

echo "<br><br><strong>Contact No.:</strong>  ". $rseditfetch2[contactnumber]. "<br><br>";

?>
        </blockquote>
                <div class="cleaner"></div>
        <blockquote><strong>No. of Vehicles record :</strong>
<?php         
$sql = "SELECT * FROM vehicle where dealerid='$_SESSION[dealerlogid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);
echo mysqli_num_rows($seleditquery);
?>
        </blockquote>
        
                        <div class="cleaner"></div>
        <blockquote><strong>No. of showroom :</strong>
<?php         
$sql = "SELECT * FROM showroom where dealerid='$_SESSION[dealerlogid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);
echo mysqli_num_rows($seleditquery);
?>
        </blockquote>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>