<?php
session_start(); 	
?>
<script type="application/javascript">
function validation()
{
		 var alphaExp = /^[a-zA-Z]+$/;
	if(document.emp.firstname.value == "")
	{
		alert("Please enter first name");
		document.emp.firstname.focus();
		return false;
	}
	else if(!document.emp.firstname.value.match(alphaExp))
	{
	alert("First name is not valid...");
	document.emp.firstname.value = "";
	document.emp.firstname.focus();
	return false;
	}
	else if(document.emp.lastname.value == "")
	{
		alert("Please enter last name");
		document.emp.lastname.focus();
		return false;
	}
	else if(!document.emp.lastname.value.match(alphaExp))
	{
	alert("First name is not valid...");
	document.emp.lastname.value = "";
	document.emp.lastname.focus();
	return false;
	}
	else if(document.emp.username.value == "")
	{
		alert("Please enter username");
		document.emp.username.focus();
		return false;
	} 	
	else if(document.emp.password.value == "")
	{
		alert("Password should not be empty");
		document.emp.password.focus();
		return false;
	}
else if(document.emp.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.emp.password.focus();
		return false;
	}
	else if(document.emp.password.value != document.emp.cpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.emp.password.focus();
		return false;
	}	
	else if(document.emp.cntctno.value == "")
	{
		alert("Contact Number should not be empty...");
		document.emp.cntctno.focus();
		return false;
	}
	else if(isNaN(document.emp.ContactNo.value))
	{
		alert("Contact Number not valid...");
		document.emp.ContactNo.focus();
		return false;
	}	
	else if(document.emp.ContactNo.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.emp.ContactNo.focus();
		return false;
	}
	else if(document.emp.address.value == "")
	{
		alert("Please enter Address");
		document.emp.address.focus();
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
if($_SESSION["setid"] == $_POST["setid"])
if(isset($_POST["submit"]))
{
	if(isset($_GET[editid]))
	{
		$result = mysqli_query($con,"UPDATE dealer SET fname='$_POST[firstname]',lname='$_POST[lastname]',username='$_POST[username]',password='$_POST[password]',contactnumber='$_POST[cntctno]',address='$_POST[address]',status='$_POST[status]' where dealerid='$_GET[editid]'");
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
$result=mysqli_query($con,"INSERT INTO dealer(fname,lname,username,password,contactnumber,address,createdat,status) values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[cntctno]','$_POST[address]','$date','$_POST[status]')");
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
$sql = "SELECT * FROM dealer where dealerid='$_GET[editid]'";
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
        	<h1>About Us</h1> 
<form name="emp" method=post action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />

<TABLE border=1 color=black class="tftable">
<tr><td colspan="2"><?php echo $res; ?></td></tr>

<tr><th>FIRSTNAME:</th><td><input type=text name=firstname value="<?php echo $rseditfetch["fname"]; ?>" ></td></tr>

<tr><th>LASTNAME:</th><td><input type=text name=lastname value="<?php echo $rseditfetch["lname"]; ?>" ></td></tr>

<tr><th>USERNAME:</th><td><input type=text name=username value="<?php echo $rseditfetch["username"]; ?>" ></td></tr>


<tr><th>PASSWORD:</th><td><input type=password name=password value="<?php echo $rseditfetch["password"]; ?>" ></td></tr>

<tr><th>CONFIRMPASSWORD:</th><td><input type=password name=cpassword value="<?php echo $rseditfetch["password"]; ?>" ></td></tr>

<tr><th>CONTACTNO:</th><td><input type=text name=cntctno value="<?php echo $rseditfetch["contactnumber"]; ?>" ></td></tr>

<tr><th>ADDRESS:</th><td><textarea name=address rows='5' cols='30'><?php echo $rseditfetch["address"]; ?></textarea> </td></tr>

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

<tr ><td colspan=2 ><center><input type=submit  name=submit value=SUBMIT></center></td></tr>

</table>

</form>
</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>