<?php
session_start();
$pagename = basename($_SERVER['PHP_SELF']); 
date_default_timezone_set("Asia/Kolkata");
include("dbconnection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Vehicle Showroom</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="index.php" rel="nofollow"></a></h1></div>
        <div id="header_right">
        	<p>
            <?php
			if(isset($_SESSION[loginid]))
			{
				$sql1 = "SELECT * FROM customer WHERE custid='$_SESSION[loginid]'";
				$qresult1 = mysqli_query($con,$sql1) ;
				$logrec1 = mysqli_fetch_array($qresult1);
			?>
            
            Welcome <?php echo $logrec1[fname] . " " . $logrec1[lname]; ?><br />
	   <strong> <a href="account.php">My Account</a> | 
          <a href="changepassword.php">Change Password</a> | 
          <a href="logout.php">Logout</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
			}
			else if(isset($_SESSION[adminid]))
			{
				$sql1 = "SELECT * FROM  admin  WHERE adminid='$_SESSION[adminid]'";
				$qresult1 = mysqli_query($con,$sql1) ;
				$logrec1 = mysqli_fetch_array($qresult1);
			?>
            
            Welcome <?php echo $logrec1[adminname]; ?><br />

               <strong> <a href="admindashboard.php">Dashboard</a> | 
          <a href="adminchangepassword.php">Change Password</a> |  
          <a href="logout.php">Logout</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	      
            <?php
			}
			else if(isset($_SESSION[dealerlogid]))
			{
				$sql1 = "SELECT * FROM  dealer  WHERE dealerid='$_SESSION[dealerlogid]'";
				$qresult1 = mysqli_query($con,$sql1) ;
				$logrec1 = mysqli_fetch_array($qresult1);
			?>
            
            Welcome <?php echo $logrec1[fname]. " ". $logrec1[lname]; ?><br />

               <strong> <a href="dealeraccount.php">Dashboard</a> | 
          <a href="dealerchangepassword.php">Change Password</a> |  
          <a href="logout.php">Logout</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	      
            <?php
			}
			else
			{
			?>            
		<strong> 
        <a href="signup.php">Register</a>  | 
           		<a href="login.php">Log In</a> |
            	<a href="forgotpassword.php">Forgot Password</a>
                </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
			}
			?>
            </p>

		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" 
                <?php
				if($pagename == "index.php")
				{					
                echo "class='selected'";
				}
				?>
                >Home</a></li>
                <li><a href="dealers.php"
                <?php
				if($pagename == "dealers.php")
				{				
                echo "class='selected'";
				}
				?>
                >Dealers</a></li>
                <li><a href="vehicles.php"
                <?php
				if($pagename == "vehicles.php")
				{						
                echo "class='selected'";
				}
				?>
                >Vehicles</a></li>
                <li><a href="account.php"
                <?php
				if($pagename == "account.php" || $pagename == "profile.php" || $pagename == "changepassword.php")
				{						
                echo "class='selected'";					
				}
				?>
                >Account</a> </li>
                <li><a href="viewvehorder.php""
                <?php
				if($pagename == "viewvehorder.php")
				{					
                echo "class='selected'";
				}
				?>
                >Orders</a></li>
               <li><a href="contact.php"
                <?php
				if($pagename == "contact.php")
				{					
                echo "class='selected'";
				}
				?>
               >Contact Us</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="vehicles.php" method="get">
              <input type="text" name="searchid" id="searchid" title="Enter vehicle name" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->