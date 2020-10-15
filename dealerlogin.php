<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	 if(document.dealerlogin.username.value == "")
	{
		alert("Please enter valid Username");
		document.dealerlogin.username.focus();
		return false;
	}

		else if(document.dealerlogin.password.value == "")
	{
		alert("Password should not be empty");
		document.dealerlogin.password.focus();
		return false;
	}
	else if(document.dealerlogin.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.dealerlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
include("dbconnection.php");

if(isset($_SESSION[dealerlogid]))
{
	header("Location: dealeraccount.php");
}

if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM dealer WHERE username='$_POST[username]' AND password='$_POST[password]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1)
	{

		$logrec = mysqli_fetch_array($qresult);
		
		$dt = date("Y-m-d h:i:s");
	
		$_SESSION[lastlogin]  = $logrec[lastlogin];
		$sqlupd = "UPDATE dealer SET lastlogin='$dt' WHERE username='$_POST[username]'";
		$qresult = mysqli_query($con,$sqlupd);
			header("Location: dealeraccount.php");
		
	$_SESSION[dealerlogid] = $logrec["dealerid"];
	//	header("Location: dealeraccount.php");
	}
	else
	{
		$resultmsg = "<br><font color='red'>Please enter valid username and password..</font>";
	}
	
}
include("header.php"); //Developed by www.freestudentprojects.com
?>
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
    	  <?php
		include("menusidebar.php");
		?>
    	</div>
        <div id="content" class="float_r">
        	<h2>Dealer Login Panel</h2>
            <h5><strong>Please enter Username and password to login..<?php echo $resultmsg; ?></strong></h5>
            <div class="content_half float_l checkout">
<form name="dealerlogin" method="post" action="" onsubmit="return validation()">

<TABLE width="562" height="157" border=0 color=black class="tftable">

<tr>
  <th><strong>USERNAME:</strong></th><td><input name=username type=text size="45" ></td></tr>


<tr><th><strong>PASSWORD:</strong></th><td><input name=password type=password size="45" ></td></tr>


<tr ><td colspan=2 ><center><input type=submit  name=submit value=LOGIN></center></td></tr>


</table>


</form>
          </div>
            
            <div class="content_half float_r checkout">
            </div>
            
            <div class="cleaner h50"></div>
			</div> 

        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
 <?php
include("footer.php");
?>