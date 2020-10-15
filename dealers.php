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
        	<h1> Dealers</h1>
          <?php
$sql = "SELECT * FROM dealer order by dealerid desc";
$result = mysqli_query($con, $sql);
$count = 1;
	while($rs = mysqli_fetch_array($result))
	{ 	
			$sql1 = "SELECT * FROM images where imgid='$rs[imgid]'";
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
	            <h3 style="background-color:#CFC;color:#900;"><?php echo $rs[companyname]; ?></h3>
            	<a href="dealerdetails.php?vid=<?php echo $rs[dealerid];?>">
                <?php
                if(mysqli_num_rows($result1) == 1)
				{
				echo "<img src='imgcompany/$rs1[imagepath]'  width='200' height='150' />";
				}
				else
				{
				echo "<img src='imgcompany/vehiclebg.jpg' width='200' height='150' />";
				}
				?>
                </a>
               
               

           <a href="dealerdetails.php?vid=<?php echo $rs[dealerid];?>"><strong>Dealer details</strong></a>

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