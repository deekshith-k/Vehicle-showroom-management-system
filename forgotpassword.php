<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	if(document.forgotpassword.email.value == "")
	{
		alert("Please enter Email ID");
		document.forgotpassword.email.focus();
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
$sql = "SELECT * FROM customer WHERE emailid='$_POST[email]'";
$qresult = mysqli_query($con,$sql);
$logrec = mysqli_fetch_array($qresult);
 $password = $logrec[password];
mail($_POST[email],"Password from Vehicle showroom  ","Vehicle showroom password is :  $password","From: tanu.heena@gmail.com");
$res = "Password sent successfully to your email..";
}

?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1><?php echo $res; ?></h1> 
<form name="forgotpassword" method="post" action="" onsubmit="return validation()">
<h1>FORGOT PASSWORD</h1>
<TABLE width="422" height="98" border=1 color=black class="tftable">
<tr>
  <th height="35"> Enter your Email ID </th><td><input type=email name=email ></td></tr>
<tr ><td height="55" colspan=2 align="center" ><input type=submit value="Recover password" name=submit></td></tr>

</table>

</form>
</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>