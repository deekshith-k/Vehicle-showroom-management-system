<?php
session_start(); 	
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
		 var alphaExp = /^[a-zA-Z]+$/;
	if(document.admin.adminname.value == "")
	{
		alert("Please enter name");
		document.admin.adminname.focus();
		return false;
	}
	else if(!document.admin.adminname.value.match(alphaExp))
	{
	alert("Admin name is not valid...");
	document.admin.adminname.value = "";
	document.admin.adminname.focus();
	return false;
	}
	else if(document.admin.username.value == "")
	{
		alert("Please enter username");
		document.admin.username.focus();
		return false;
	}

		else if(document.admin.password.value == "")
	{
		alert("Password should not be empty");
		document.admin.password.focus();
		return false;
	}
else if(document.admin.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.admin.password.focus();
		return false;
	}
	else if(document.admin.password.value != document.admin.cpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.admin.password.focus();
		return false;
	}	
	else if(document.admin.contno.value == "")
	{
		alert("Contact Number should not be empty...");
		document.admin.contno.focus();
		return false;
	}
	else if(isNaN(document.admin.contno.value))
	{
		alert("Contact Number not valid...");
		document.admin.contno.focus();
		return false;
	}	
	else if(document.admin.contno.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.admin.contno.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
$date=date("Y-m-d");
if($_SESSION["setid"] == $_POST["setid"])

if(isset($_POST["submit"]))
{
	if(isset($_GET[editid]))
	{
		$result = mysqli_query($con,"UPDATE admin SET adminname='$_POST[adminname]',username='$_POST[username]',password='$_POST[password]',contactnumber='$_POST[contno]',status='$_POST[status]' where adminid='$_GET[editid]'");
		if(!$result)
		{
			$res = "<br>Failed to update record";
		}
		else
		{
			$res = "<br>Record updated successfully..."; 
		}
	}
	else
	{
	$result=mysqli_query($con,"INSERT INTO admin(adminname,username,password,contactnumber,createdat,status) values('$_POST[adminname]','$_POST[username]','$_POST[password]','$_POST[contno]','$date','$_POST[status]')");
	if(!$result)
		{
			$res = "failed to insert record";
		}
		else
		{
			$res = "Record inserted successfully..."; 
		}
	
	}
	
}
$_SESSION["setid"] = rand();
$sql = "SELECT * FROM admin where adminid='$_GET[editid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);

?>
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
        	<h1>Add Administrator</h1>
<form name="admin" method="post" action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
<TABLE width="372" border=1 color=black class="tftable">
<tr><td colspan="2"><?php echo $res; ?></td></tr>

<tr><th>ADMINNAME:</th><td><input type=text name=adminname value="<?php echo $rseditfetch["adminname"]; ?>" > </td></tr>

<tr><th>USERNAME:</th><td><input type=text name=username value="<?php echo $rseditfetch["username"]; ?>" > </td></tr>

<tr><th>PASSWORD:</th><td><input type=password name=password value="<?php echo $rseditfetch["password"]; ?>" > </td></tr>

<tr><th>CONFIRMPASSWORD:</th><td><input type=password name=cpassword value="<?php echo $rseditfetch["password"]; ?>"  ></td></tr>

<tr><th>CONTACTNUMBER</th><td><input type=text name=contno value="<?php echo $rseditfetch["contactnumber"]; ?>" ></td></tr>

<tr><th>STATUS:</th><td>
<select name=status>

<option>Select</option>
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

<tr ><td colspan=2 ><center><input type=submit value=SUBMIT name=submit></center></td></tr>

</table>

</form>
  </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>