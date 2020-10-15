<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	if(document.admin.username.value=="")
	{
		alert("Please enter valid username");
		document.admin.username.focus();
		return false;
	}
	else if(document.admin.password.value=="")
	{
		alert("Please enter the valid password");
		document.admin.password.focus();
		return false;
	}
	else if(document.admin.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.admin.password.focus();
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

if(isset($_SESSION[adminid]))
{
	header("Location: admindashboard.php");
}

if(isset($_POST["submit"]))
{
   $sql = "SELECT * FROM admin where username='$_POST[username]' AND password='$_POST[password]'";
   $qresult = mysqli_query($con,$sql);
   if(mysqli_num_rows($qresult)==1)
    {
		$logrec = mysqli_fetch_array($qresult);
		$_SESSION[adminid] = $logrec["adminid"];
		header("Location: admindashboard.php");
    }
    else
    {
	$resultmsg ="<br><font color='red'>ENTER VALID EMAILID AND PASSWORD</font>";
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
        	<h2>Administrator Login Panel</h2>
            <h5><strong>Please enter Username and password to login..<?php echo $resultmsg;?></strong></h5>
            <div class="content_half float_l checkout">
<form  name="admin" method="post" action"" onsubmit="return validation()">
    <TABLE width="562" height="157" border=0 color=black class="tftable">
    <tr><th>USERNAME:</th><td><input name="username" type=text size="45" ></td></tr>
    <tr><th>PASSWORD:</th><td><input name="password" type=password size="45" ></td></tr>
    <tr ><td colspan=2 align="center"><input type="submit"  name="submit" value="LOGIN"></td></tr>
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