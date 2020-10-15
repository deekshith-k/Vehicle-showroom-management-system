<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	var alphaExp = /^[a-zA-Z]+$/;
	if(document.adminpro.adminname.value=="")
	{
		alert("Please enter the name");
		document.adminpro.adminname.focus();
		return false;
	}
	else if(!document.adminpro.adminname.value.match(alphaExp))
	{
	alert("Name is not valid...");
	document.adminpro.adminname.value = "";
	document.adminpro.adminname.focus();
	return false;
	}
	else if(document.adminpro.username.value=="")
	{
		alert("Please enter the username");
		document.adminpro.username.focus();
		return false;
	}
	else if(document.adminpro.password.value=="")
	{
		alert("Please enter valid password");
		document.adminpro.password.focus();
		return false;
	}
	else if(document.adminpro.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.adminpro.password.focus();
		return false;
	}
	else if(document.adminpro.password.value != document.adminpro.confirmpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.adminpro.password.focus();
		return false;
	}	
	else if(document.adminpro.contactnumber.value=="")
	{
		alert("Please enter your contact number");
		document.adminpro.contactnumber.focus();
		return false;
	}
	else if(isNaN(document.adminpro.contactnumber.value))
	{
		alert("Contact Number not valid...");
		document.adminpro.ContactNo.focus();
		return false;
	}	
	else if(document.adminpro.contactnumber.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.adminpro.contactnumber.focus();
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
$date=date("Y-m-d");
if($_SESSION["setid"]==$_POST["setid"])
{
	if(isset($_POST["register"]))
	{
		if(isset($_SESSION[loginid]))
		{
			$custlogid = $_SESSION[loginid];
		}	
			if(isset($_GET[editid]))
			{
				$result = mysqli_query($con,"UPDATE admin SET adminname='$_POST[adminname]',username='$_POST[username]',password='$_POST[password]',contactnumber='$_POST[contactnumber]',status='$_POST[status]' where adminid='$_SESSION[adminid]'");
				if(!$result)
				{
					$res = "<br>Failed to update record";
				}
				else
				{
					$res = "<br>Record updated successfully..."; 
				}
			}
			else if(isset($_GET[profile]))
			{
				$result = mysqli_query($con,"UPDATE admin SET adminname='$_POST[adminname]',username='$_POST[username]',contactnumber='$_POST[contactnumber]',status='$_POST[status]' where adminid='$_SESSION[adminid]'");
				if(!$result)
				{
					$resi = 1;
					$res = "<br>Failed to update record";
				}
				else
				{
					$resi = 1;
					$res = "<br>Record updated successfully..."; 
				}
			}
			else
			{
				$result=mysqli_query($con,"INSERT INTO admin(adminname,username,password,contactnumber,status) values('$_POST[adminname]','$_POST[username]','$_POST[password]','$_POST[contactnumber]','$_POST[status]')");
				
				if(mysqli_affected_rows($con) == 1)
				{
					$resi = 1; 
					$res = "<font color='green'><strong>Record inserted successfully...</strong></font>"; 
		
				}
				else
				{
						$resi = 1; 
						$res = "<br>Failed to insert record";
				}
			}
	}
}
$_SESSION["setid"]=rand();

if(isset($_GET[profile]))
{
$sql = "SELECT * FROM admin where adminid='$_SESSION[adminid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);
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
        	<h1>Admin Profile</h1>
<form name="adminpro" method=post action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />

<TABLE width="516" height="259" border=1 color=black class="tftable">
<?php
if($resi == 1)
{
echo "<tr><td colspan='2' align='center'>";
echo " <strong>$res</strong>";
echo "</td></tr>";
}
?>	


<tr><th width="181" height="41">ADMINNAME:</th><td width="319"><input type=text name=adminname value="<?php echo $rseditfetch["adminname"]; ?>" ></td></tr>
<tr><th height="40">USERNAME:</th><td><input type=text name=username value="<?php echo $rseditfetch["username"]; ?>"></td></tr>
<tr>
  <th height="39">PASSWORD:</th>
  <td><input type=password name=password value="<?php echo $rseditfetch["password"]; ?>" /></td>
</tr>
<tr>
  <th height="39">CONFIRM PASSWORD</th><td><input name="confirmpassword" type="password" id="confirmpassword" value="<?php echo $rseditfetch["password"]; ?>" /></td></tr>
<tr><th height="41">CONTACTNUMBER:</th><td><input type=text name=contactnumber value="<?php echo $rseditfetch["contactnumber"]; ?>" /></td></tr>
<tr><th height="34">STATUS:</th><td>
<select name=status>
<?php
$arr = array("Enabled","Disabled");
foreach($arr as $value)
{
	if($value== $rseditfetch["status"])
	{
	echo "<option value='$value' selected>$value</option>";
	}
	else
	{
	echo "<option value='$value'>$value</option>";
	}
}
?>
</select>
</td></tr>
<tr ><td colspan=2 ><center><input type=submit value="REGISTER" name="register"></center></td></tr>
</table>
</form>
  </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>