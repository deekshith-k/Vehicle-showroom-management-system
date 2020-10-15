<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	if(document.loginform.emailid.value == "")
	{
		alert("Please enter emailid");
		document.loginform.emailid.focus();
		return false;
	}
	else if(document.loginform.password.value == "")
	{
		alert("Password should not be empty");
		document.loginform.password.focus();
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

if(isset($_SESSION[loginid]))
{
	header("Location: account.php");
}

if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM customer WHERE emailid='$_POST[emailid]' AND password='$_POST[password]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1)
	{
		$dt = date("Y-m-d h:i:s");
		$logrec = mysqli_fetch_array($qresult);
		$_SESSION[lastlogin]  = $logrec[lastlogin];
		$sqlupd = "UPDATE customer SET lastlogin='$dt' WHERE custid='$logrec[custid]'";
		$qresultupd = mysqli_query($con,$sqlupd);
		
		$logrecupd = mysqli_fetch_array($sqlupd);
		
		$_SESSION[loginid] = $logrec["custid"];
		if(isset($_GET[vid]))
		{
			header("Location: buyvehicleform.php?vid=$_GET[vid]&showroomid=$_GET[showroomid]");
		}
		else
		{
			header("Location: account.php");
		}
	}
	else
	{
		$resultmsg = "<br><font color='red'>Please enter valid Email ID and password..</font>";
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
        	<h2>Login Panel</h2>
            <h5><strong>Please enter Username and password to login..<?php echo $resultmsg; ?></strong></h5>
            <div class="content_half float_l checkout">
            
            <form name=loginform method="post" action="" onsubmit="return validation()">         

<TABLE width="562" height="181" border=0 color=black class="tftable">

<tr>
  <th height="47"><strong>EMAIL ID:</strong></th><td><input name=emailid type=email id="emailid" size="45" ></td></tr>


<tr><th height="50"><strong>PASSWORD:</strong></th><td><input name=password type=password size="45" ></td></tr>


<tr ><td colspan=2 ><center><input type=submit  name=submit value=LOGIN></center></td></tr>
<tr >
  <td colspan=2 align="center" ><a rel="nofollow" href="forgotpassword.php"><strong>Forgot your password?</strong></a></td>
</tr>


</table>
<p><a href="signup.php"><img src="images/new user.jpg" width="561" height="96" border="3" /></a></p>


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