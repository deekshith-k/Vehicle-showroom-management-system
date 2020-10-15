<?php
session_start();
include("header.php"); //Developed by www.freestudentprojects.com
include("fancybox.php");
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
<?php
		include("menusidebar.php");

$sql = "SELECT * FROM vehicle where vehid='$_GET[vid]'";
$result = mysqli_query($con, $sql);
$count = 1;
$rs = mysqli_fetch_array($result);

			$sqlimg = "SELECT * FROM images where vehid='$rs[vehid]' order by rand() limit 1";
			$resultimg = mysqli_query($con, $sqlimg);
			$rs1 = mysqli_fetch_array($resultimg);
			
           
?>   
    	</div>
        <div id="content" class="float_r">
       	  <h1><?php echo $rs[vehname]; ?></h1>
         
   <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"></a>
               <?php
                if(mysqli_num_rows($resultimg) == 1)
				{
				echo "<a class='fancybox' href='imgvehicle/$rs1[imagepath]' data-fancybox-group='gallery' title='$rs1[imagename]'><img src='imgvehicle/$rs1[imagepath]' width='200' height='150' />";
				}
				else
				{
				echo "<img src='images/vehiclebg.jpg'  width='200' height='150' />";
				}
				?>
                </a> </div>
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160">Price:</td>
                        <td><?php echo $rs[vehcost]; ?></td>
                    </tr>
                    <tr>
                        <td>type:</td>
                        <td><?php echo $rs[vehtype]; ?> </td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td><?php echo $rs[vehmodel]; ?> </td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td><?php
							$sql2 = "SELECT * FROM dealer where dealerid='$rs[dealerid]'  ";
							$result2 = mysqli_query($con, $sql2);
							$rs2= mysqli_fetch_array($result2);
						 echo $rs2[companyname]; 
						 
						 ?></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                <a href="buyvehicle.php?vid=<?php echo $rs[vehid];?>" class="addtocart"></a>

			</div>
            <div class="cleaner h30"></div>
              
            <h5>Vehicle Description</h5>
          <p><?php echo $rs[vehdescription]; ?>
            </p>
          <div class="cleaner h50"></div>
            
            <h3>Vehicle images</h3>            
                        
<?php
$count = 1;
 	
			$sql1 = "SELECT * FROM images where vehid='$_GET[vid]'  ";
			$result1 = mysqli_query($con, $sql1);
		while($rs = mysqli_fetch_array($result1))
		{
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
	            <h3><?php echo $rs[imagename]; ?></h3>
            	<a href="vehicledetail.php">
                <?php
				echo "<a class='fancybox' href='imgvehicle/$rs[imagepath]' data-fancybox-group='gallery' title='$rs[imagename]'><img src='imgvehicle/$rs[imagepath]' alt='<?php $rs1[imagepath]; ?>' width='200' height='150' /></a>";
				?>
                </a>
            </div>        	                    	
<?php
			$count++;
		}
?>             
          
      </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
   <?php
include("footer.php");
?>