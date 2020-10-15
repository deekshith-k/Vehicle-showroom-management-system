<?php
session_start();
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
	 var alphaExp = /^[a-zA-Z]+$/;
	if(document.profile.firstname.value == "")
	{
		alert("Please enter first name");
		document.profile.firstname.focus();
		return false;
	}
	else if(!document.profile.firstname.value.match(alphaExp))
	{
	alert("First name is not valid...");
	document.profile.firstname.value = "";
	document.profile.firstname.focus();
	return false;
	}
	else if(document.profile.lastname.value == "")
	{
		alert("Please enter last name");
		document.profile.lastname.focus();
		return false;
	}
	else if(!document.profile.lastname.value.match(alphaExp))
	{
	alert("Last name is not valid...");
	document.profile.lastname.value = "";
	document.profile.lastname.focus();
	return false;
	}
	else if(document.profile.emailid.value == "")
	{
		alert("Please enter Email ID");
		document.profile.emailid.focus();
		return false;
	}
	else if(document.profile.contactno.value == "")
	{
		alert("Please enter contact number");
		document.profile.contactno.focus();
		return false;
	}
	else if(isNaN(document.profile.contactno.value))
	{
		alert("Contact Number not valid...");
		document.profile.contactno.focus();
		return false;
	}	
	else if(document.profile.address.value == "")
	{
		alert("Please enter Address");
		document.profile.address.focus();
		return false;
	}
		else if(document.profile.city.value == "")
	{
		alert("Please enter city");
		document.profile.city.focus();
		return false;
	}
	else if(!document.profile.city.value.match(alphaExp))
	{
	alert("city is not valid...");
	document.profile.city.value = "";
	document.profile.city.focus();
	return false;
	}	
		else if(document.profile.state.value == "")
	{
		alert("Please enter state");
		document.profile.state.focus();
		return false;
	}
	else if(!document.profile.state.value.match(alphaExp))
	{
	alert("State is not valid...");
	document.profile.state.value = "";
	document.profile.state.focus();
	return false;
	}
else if(document.profile.pincode.value == "")
	{
		alert("Please enter PIN Code");
		document.profile.pincode.focus();
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
if($_SESSION["setid"]==$_POST["setid"])
{
	if(isset($_POST["register"]))
	{
		if(isset($_SESSION[loginid]))
		{
			$custlogid = $_SESSION[loginid];
		}
		
		$result = mysqli_query($con,"UPDATE customer SET fname='$_POST[firstname]',lname='$_POST[lastname]',contactno='$_POST[contactno]',emailid='$_POST[emailid]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',gender='$_POST[gender]',createdat='$_POST[createdat]',status='$_POST[status]' where custid='$custlogid'");
		if(mysqli_affected_rows($con) == 1)
		{
			$resi = 1; 
			$res = "<font color='green'><strong>Record updated successfully...</strong></font>"; 

		}
		else
		{
				$resi = 1; 
				$res = "<br>Failed to update record";
		}
	}
}

$_SESSION["setid"]=rand();

$sql = "SELECT * FROM customer where custid='$_SESSION[loginid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);

include("header.php"); //Developed by www.freestudentprojects.com
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1>My Profile</h1>
<form  name="profile" method="post" action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />

<TABLE width="516" height="522" border=1 color=black class="tftable">
<?php
if($resi == 1)
{
echo "<tr><td colspan='2' align='center'>";
echo $res;
echo "</td></tr>";
}
?>	

<tr><th width="160">FIRSTNAME:</th><td width="254"><input type=text name=firstname value="<?php echo $rseditfetch["fname"]; ?>" ></td></tr>

<tr><th>LASTNAME:</th><td><input type=text name=lastname value="<?php echo $rseditfetch["lname"]; ?>" ></td></tr>

<tr><th>EMAIL-ID:</th><td><input type=text name=emailid value="<?php echo $rseditfetch["emailid"]; ?>"></td></tr>

<tr><th>CONTACTNO:</th><td><input type=text name=contactno value="<?php echo $rseditfetch["contactno"]; ?>"></td></tr>

<tr><th>ADDRESS:</th><td><textarea name=address rows='5' cols='30' ><?php echo $rseditfetch["address"]; ?></textarea></td></tr>

<tr><th>CITY:</th><td><input type=text name=city value="<?php echo $rseditfetch["city"]; ?>"></td></tr>

<tr><th>STATE:</th><td><input type=text name=state value="<?php echo $rseditfetch["state"]; ?>"></td></tr>

<tr><th>PINCODE:</th><td><input type=text name=pincode value="<?php echo $rseditfetch["pincode"]; ?>"></td></tr>

<tr><th>GENDER:</th><td>
<?php
$arr = array("Male","Female");
foreach($arr as $value)
{
	if($value== $rseditfetch["gender"])
	{
	echo "$value <input type=radio name=gender value='$value' checked >";
	}
	else
	{
	echo "$value <input type=radio name=gender value='$value' >";
	}
}
?></td></tr>
<!--
<tr><td>STATUS:</td><td>
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
-->
<tr ><td colspan=2 ><center><input type=submit value="SUBMIT" name="register"></center></td></tr>
</table>
</form>
  </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>