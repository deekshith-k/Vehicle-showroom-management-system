<?php
session_start();
include("dbconnection.php");
		
		if(isset($_SESSION[loginid]))
		{
?>
       <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Customer account</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
					  <li class="first"><a href="account.php">My Account</a></li>
                        <li><a href='profile.php'>My Profile</a></li>
                        <li><a href='changepassword.php'>Change Password</a></li>                          
                        <li><a href='viewvehorder.php'>Vehicle Order Report</a></li>                                            
                      <li class="last"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
<?php
		}

		if(isset($_SESSION[dealerlogid]))
		{
?>
       <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Dealer account</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
					  <li class="first"><a href="dealeraccount.php">My Account</a></li>
                        <li><a href='dealer.php?editid=<?php echo $_SESSION[dealerlogid]; ?>'>My Profile</a></li>
                        <li><a href='dealerchangepassword.php'>Change Password</a></li> 
                        <li><a href='showroom.php'>Add Showroom</a></li>
                        <li><a href='viewshowroom.php'>View Showroom</a></li>                         
                        <li><a href='addvehicles.php'>Sell Vehicle</a></li>                       
                        <li><a href='viewveh.php'>View Vehicles</a></li>      
                        <li><a href='viewvehorder.php'>Vehicle Order Report</a></li>                                            
                      <li class="last"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
<?php
		}
		
		if(isset($_SESSION[adminid]))
		{
?>
       <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Administrator account</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
					  <li class="first"><a href="admindashboard.php">Dashboard</a></li>
                        <li><a href='adminprofile.php?profile=set'>My Profile</a></li>
                        <li><a href='adminchangepassword.php'>Change Password</a></li>                          
                        <li><a href='viewcustomer.php'>View Customers</a></li>         
                      <li><a href='dealer.php'>Add dealer</a></li>         
                    <li><a href='viewdealers.php'>View dealers</a></li>
                    <li><a href='showroom.php'>Add Showroom</a></li>
                    <li><a href='viewshowroom.php'>View Showroom</a></li> 
                     <li><a href='viewveh.php'>View Vehicles</a></li>                 
                        <li><a href='viewvehorder.php'>Vehicle Order Report</a></li>  
                      <li><a href='taxconfiguration.php'>TAX Configuration</a></li>
                      <li><a href='viewtax.php'>View TAX Configuration</a></li>
                      <li class="last"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
<?php
		}
?>
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Vehicles list</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
					<li class="first">
						<a href="#"></a></li>
                        <?php
						$sqlq = mysqli_query($con,"SELECT * FROM vehicle ORDER BY RAND() LIMIT 15");
						while($rs = mysqli_fetch_array($sqlq))
						{
                        echo "<li><a href='vehicledetail.php?vid=$rs[0]'>$rs[vehname]</a></li>";
						}
						?>
                        <li class="last"><a href="vehicles.php">All Vehicles</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3><a class="sidebar_box_icon" href=""   target="_blank"><img src="images/templatemo_sidebar_header.png" alt="Gratis foto" title="Gratis foto" /></a>Dealers </h3>   
                <div class="content"> 
                        <?php
						$sqlq = mysqli_query($con,"SELECT * FROM dealer INNER JOIN images ON images.imgid=dealer.imgid ORDER BY RAND() LIMIT 6");
						while($rs = mysqli_fetch_array($sqlq))
						{                        
						?>
                	<div class="bs_box">
                    	<a href="dealerdetails.php?vid=<?php echo $rs[0]; ?>"><img src="imgcompany/<?php echo $rs[imagepath]; ?>" height='35' width="35" /></a>
                        <h4><a href="dealerdetails.php?vid=<?php echo $rs[0]; ?>"><?php echo $rs[companyname]; ?></a></h4>
                        <p class="price"><?php echo $rs[companyname]; ?></p>
                        <div class="cleaner"></div>
                    </div>
						<?php
						}
						?>
                </div>
            </div>