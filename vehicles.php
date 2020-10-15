<?php
include("header.php"); //Developed by www.freestudentprojects.com
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1> Vehicles</h1>
          <?php
if(isset($_GET[did]))
{		  
$sql = "SELECT * FROM vehicle where dealerid='$_GET[did]' order by vehid desc";
}
else if(isset($_GET[searchid]))
{		  
$sql = "SELECT * FROM  `vehicle` WHERE  `vehname` LIKE  '%$_GET[searchid]%' OR  `vehmodel` LIKE  '%$_GET[searchid]%' order by vehid desc";
}
else
{
$sql = "SELECT * FROM vehicle order by vehid desc";
}
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) == 0)
{
echo "<h2>No vehicles found</h2>";
}
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
    </div> <!-- END of templatemo_main -->
    
   <?php
   include("footer.php");
   ?>