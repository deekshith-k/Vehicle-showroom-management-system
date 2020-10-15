<?php
include("header.php"); //Developed by www.freestudentprojects.com
include("dbconnection.php");
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        
        <div id="content" class="float_r">
        	<h1>Dashboard</h1>

        <div class="cleaner"></div>

                <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqadmin = mysqli_query($con,"SELECT * FROM admin");
			echo "No of Admin records: ". mysqli_num_rows($sqlqadmin);
		?>
        </blockquote>
                <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqcustomer = mysqli_query($con,"SELECT * FROM customer ");
			echo "No of Customer records: ". mysqli_num_rows($sqlqcustomer);
		?>
        </blockquote>
                <div class="cleaner"></div>
        <blockquote><?php
			$sqlqdealer = mysqli_query($con,"SELECT * FROM dealer ");
			echo "No of Dealer records: ". mysqli_num_rows($sqlqdealer);
		?>
        </blockquote>
         <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqimage = mysqli_query($con,"SELECT * FROM images ");
			echo "No of Image records: ". mysqli_num_rows($sqlqimage);
		?>
        </blockquote>
         <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqsales = mysqli_query($con,"SELECT * FROM sales ");
			echo "No of Sales records: ". mysqli_num_rows($sqlqsales);
		?>
        </blockquote>
         <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqshowroom = mysqli_query($con,"SELECT * FROM showroom ");
			echo "No of Showroom records: ". mysqli_num_rows($sqlqshowroom);
		?>
        </blockquote>
         <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqtax = mysqli_query($con,"SELECT * FROM tax ");
			echo "No of Tax records: ". mysqli_num_rows($sqlqtax);
		?>
        </blockquote>
        <div class="cleaner"></div>
        <blockquote>
        <?php
			$sqlqvehicle = mysqli_query($con,"SELECT * FROM vehicle ");
			echo "No of Vehicle records: ". mysqli_num_rows($sqlqvehicle);
		?>
        </blockquote>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>