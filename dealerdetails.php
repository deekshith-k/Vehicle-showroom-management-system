<?php
include("header.php"); //Developed by www.freestudentprojects.com
include("dbconnection.php");
$sqldealer = "SELECT * FROM dealer where dealerid='$_GET[vid]'";
$resultdealer = mysqli_query($con, $sqldealer);
$rsdealer = mysqli_fetch_array($resultdealer);
$count = 1;


			$sql1 = "SELECT * FROM images where imgid='$rsdealer[imgid]'";
			$result1 = mysqli_query($con, $sql1);
			$rs1 = mysqli_fetch_array($result1);
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
    	    <?php
			include("menusidebar.php");          
			?>   
    	</div>
        <div id="content" class="float_r">
       	  <h1><?php echo $rsdealer[companyname]; ?></h1>
         
   <div class="content_half float_l">
                <?php
                if(mysqli_num_rows($result1) == 1)
				{
				echo "<img src='imgcompany/$rs1[imagepath]' width='200' height='150' />";
				}
				else
				{
				echo "<img src='images/noimage.gif'  width='200' height='150' />";
				}
				?>
               </div>
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160"><strong>Company name:</strong></td>
                        <td><?php echo $rsdealer[companyname]; ?></td>
                    </tr>
                    <tr>
                        <td width="160"><strong>Owners name:</strong></td>
                        <td><?php echo $rsdealer[fname] . " ". $rsdealer[lname]; ?></td>
                    </tr>
                     <tr>
                        <td><strong>Address:</strong></td>
                        <td><?php echo $rsdealer[address]; ?> </td>
                    </tr>
                     <tr>
                        <td><strong>Contact number:</strong></td>
                        <td><?php echo $rsdealer[contactnumber]; ?> </td>
                    </tr>
                   
                </table>
                <div class="cleaner h20"></div>

			</div>
            <div class="cleaner h30"></div>

          <div class="cleaner h50"></div>
       <div id="content" class="float_r">
        	<h1> Vehicles</h1>
          <?php		  
$sql = "SELECT * FROM vehicle where dealerid='$_GET[vid]' order by vehid desc";

$result = mysqli_query($con, $sql);
$count = 1;
	while($rs = mysqli_fetch_array($result))
	{ 	
			$sql1 = "SELECT * FROM images where vehid='$rs[vehid]' order by rand() limit 1 ";
			$result1 = mysqli_query($con, $sql1);
			$rs1 = mysqli_fetch_array($result1);
			
            if($count== 1 || $count == 2)
			{
			echo "<div class='product_box'>";
			}
			else
			{
            echo "<div class='product_box no_margin_right'>";
			$count=1;
			}
?>            
	            <h3><?php echo $rs[vehname]; ?></h3>
            	<a href="vehicledetail.php?vid=<?php echo $rs[vehid];?>">
                <?php
                if(mysqli_num_rows($result1) == 1)
				{
				echo "<img src='imgvehicle/$rs1[imagepath]' alt='$rs1[imagename]' width='200' height='150' />";
				}
				else
				{
				echo "<img src='images/vehiclebg.jpg' alt='<?php $rs1[imagename]; ?>' width='200' height='150' />";
				}
				?>
                </a>
                <p>Model: <?php echo $rs[vehmodel]; ?></p>
                <p>Type: <?php echo $rs[vehtype]; ?></p>
                <p class="product_price">Rs. <?php echo $rs[vehcost]; ?></p>
                <a href="buyvehicle.php?vid=<?php echo $rs[vehid];?>" class="addtocart"></a>
                <a href="vehicledetail.php?vid=<?php echo $rs[vehid];?>" class="detail"></a>
            </div>        	                    	
<?php
	$count++;
	}
?>
            <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div>

        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
   <?php
include("footer.php");
?>