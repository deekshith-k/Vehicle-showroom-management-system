<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	if(document.dealerchangepwd.emailid.value=="")
	{
		alert("Please enter emailid");
		document.dealerchangepwd.emailid.focus();
		return false;
	}
	else if(document.dealerchangepwd.opassword.value=="")
	{
		alert("Please enter the old password");
		document.dealerchangepwd.opassword.focus();
		return false;
	}
	else if(document.dealerchangepwd.npassword.value=="")
	{
		alert("Please enter the newpassword");
		document.dealerchangepwd.npassword.focus();
		return false;
	}
	else if(document.dealerchangepwd.npassword.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.dealerchangepwd.npassword.focus();
		return false;
	}
	else if(document.dealerchangepwd.cpassword.value=="")
	{
		alert("Please confirm the password");
		document.dealerchangepwd.cpassword.focus();
		return false;
	}
	else if(document.dealerchangepwd.npassword.value != document.dealerchangepwd.cpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.dealerchangepwd.npassword.focus();
		return false;
	}	
	else
	{
		return true;
	}
}
</script>
	<?php
include("header.php"); //Developed by www.freestudentprojects.com
include("dbconnection.php");
if(isset($_POST[submit]))
{
		$result = mysqli_query($con,"UPDATE dealer SET password='$_POST[npassword]' where username='$_POST[emailid]' AND password='$_POST[opassword]'");
		if(mysqli_affected_rows($con) == 1)
		{
			$resi = 1; 
			$res = "<font color='green'><strong>Password updated successfully...</strong></font>"; 

		}
		else
		{
				$resi = 1; 
				$res = "<strong><font color='red'>Failed to update password</font></strong>";
		}
}
$sqlview = "SELECT * FROM dealer WHERE dealerid='$_SESSION[dealerid]'";
$qresult = mysqli_query($con,$sqlview);
$fetchlog = mysqli_fetch_array($qresult);
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1>Change password</h1> 
<form name="dealerchangepwd" method="post" action="" onsubmit="return validation()">

<TABLE width="422" height="228" border=1 color=black class="tftable">


<?php
if($resi == 1)
{
?>
<tr>
<td colspan="2">
<?php
echo $res;
?></td>
</tr>
<?php
}
?>

<tr><th>&nbsp; Login ID:</th><td><input type=text name="emailid" value="<?php echo $fetchlog[username]; ?>"
<?php
if(isset($_SESSION[loginid]))
{
	echo "readonly";
}
?>
></td></tr>

<tr>
  <th>&nbsp; Old Password: </th><td><input type=password name=opassword ></td></tr>

<tr>
  <th>&nbsp; New Password: </th><td><input type=password name=npassword ></td></tr>

<tr>
  <th>&nbsp; Confirm Password: </th><td><input type=password name=cpassword ></td></tr>


<tr ><td colspan=2 align="center" ><input type=submit value=CHANGE PASSWORD name=submit></th></tr>

</table>

</form>
</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>