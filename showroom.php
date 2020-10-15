<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
		 var alphaExp = /^[a-zA-Z]+$/;

	if(document.showroom.showroomname.value=="")
	{
		alert("Please enter showroomname");
		document.showroom.showroomname.focus();
		return false;
	}
	else if(document.showroom.contactno.value=="")
	{
		alert("Please enter the contact number");
		document.showroom.contactno.focus();
		return false;
	}
	else if(isNaN(document.showroom.ContactNo.value))
	{
		alert("Contact Number not valid...");
		document.showroom.ContactNo.focus();
		return false;
	}	
	else if(document.showroom.ContactNo.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.showroom.ContactNo.focus();
		return false;
	}
	else if(document.showroom.address.value=="")
	{
		alert("Please enter the address");
		document.showroom.address.focus();
		return false;
	}
	else if(document.showroom.city.value=="")
	{
		alert("Please enter the city");
		document.showroom.city.focus();
		return false;
	}
	else if(!document.showroom.city.value.match(alphaExp))
	{
	alert("city is not valid...");
	document.showroom.city.value = "";
	document.showroom.city.focus();
	return false;
	}
	else if(document.showroom.state.value=="")
	{
		alert("Please enter the state");
		document.showroom.state.focus();
		return false;
	}
	else if(!document.showroom.state.value.match(alphaExp))
	{
	alert("State is not valid...");
	document.showroom.state.value = "";
	document.showroom.state.focus();
	return false;
	}
	else if(document.showroom.pincode.value=="")
	{
		alert("Please enter the pincode");
		document.showroom.pincode.focus();
		return false;
	}
	else if(isNaN(document.showroom.pincode.value))
	{
		alert("Pincode not valid...");
		document.showroom.pincode.focus();
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
if($_FILES[images][size] == 0)
{
$imgname = $_POST[oldimage];
}
else
{
$imgname = rand(). $_FILES[images][name];
move_uploaded_file($_FILES[images][tmp_name],"imgshowroom/".$imgname);
}

if($_SESSION["setid"] == $_POST["setid"])
{
if(isset($_POST["submit"]))
{
	if(isset($_SESSION[adminid]))
	{
		$dealerid = $_POST[dealerid];
	}
	else
	{
		$dealerid = $_SESSION[dealerlogid];
	}
	
	if(isset($_GET[editid]))
	{
		$result = mysqli_query($con,"UPDATE showroom SET dealerid='$dealerid',showroomname='$_POST[showroomname]',imagepath='$imgname',contactno='$_POST[contactno]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',status='$_POST[status]' where showroomid='$_GET[editid]'");
		if(!$result)
		{
			$res = "<strong>Failed to update record</strong>";
		}
		else
		{
			$res = "<strong>Record updated successfully...</strong>"; 
		}
	}
	else
	{
	$result=mysqli_query($con,"INSERT INTO showroom (dealerid,showroomname,imagepath,contactno,address,city,state,pincode,status) values('$dealerid','$_POST[showroomname]','$imgname','$_POST[contactno]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[status]')");
	if(!$result)
		{
			$res = "<strong>failed to insert record</strong>";
		}
		else
		{
			$res = "<strong>Record inserted successfully...</strong>"; 
		}
	
	}
}
}

$_SESSION["setid"] = rand();
$sql = "SELECT * FROM showroom where showroomid='$_GET[editid]'";
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
        	<h1>Add Showroom</h1>
<form name="showroom" method="post" action="" enctype="multipart/form-data" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
<TABLE width="528" height="452" border=1 color=black class="tftable">
<tr><td colspan="2"><?php echo $res; ?></td></tr>
<?php
if(isset($_SESSION[adminid]))
{
?>
<tr><th>DEALER:</th><td>
<select name="dealerid">
<option value="Select">Select</option>
<?php
$sqldealer = "SELECT * FROM dealer where status='Enabled'";
$sqlquery  = mysqli_query($con,$sqldealer);
while($rsres = mysqli_fetch_array($sqlquery))
{
	if($rsres[dealerid]== $rseditfetch["dealerid"])
	{
	echo "<option value='$rsres[dealerid]' selected>$rsres[companyname] :  $rsres[fname] $rsres[lname]</option>";
	}
	else
	{
	echo "<option value='$rsres[dealerid]'>$rsres[companyname] :  $rsres[fname] $rsres[lname]</option>";
	}
}
?>
</select>
</td></tr>
<?php
}
?>
<tr><th>SHOWROOM:</th><td><input name=showroomname type=text value="<?php echo $rseditfetch["showroomname"]; ?>" size="35" > </td></tr>

<tr><th>IMAGE:</th><td><input name=images type=file size="35" > 
<input name=oldimage type=hidden size="35" value="<?php echo $rseditfetch[imagepath]; ?>" > 
<?php
if(isset($_GET[editid]))
{
	echo "<br>";
	if($rseditfetch[imagepath] == "")
	{
	echo "<img src='images/noimage.gif' height='100' width='150'></img>";
	}
	else
	{
	echo "<img src='imgshowroom/$rseditfetch[imagepath]'  height='100' width='150'></img>";
	}
}
?>
</td></tr>

<tr>
  <th>CONTACT NUMBER:</th><td><input name=contactno type=text value="<?php echo $rseditfetch["contactno"]; ?>" size="35"  ></td></tr>

<tr><th>ADDRESS:</th><td><textarea name=address rows='5' cols='30'><?php echo $rseditfetch["address"]; ?></textarea> </td></tr>

<tr><th>CITY:</th><td><input type=text name=city value="<?php echo $rseditfetch["city"]; ?>" ></td></tr>

<tr><th>STATE:</th><td>
<select name=state >

<option value="Select">Select</option>
<?php
$arr = array("Karnataka","Kerala", "Goa");
foreach($arr as $value)
{
	if($value== $rseditfetch["state"])
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

<tr><th>PINCODE:</th><td><input type=text name=pincode value="<?php echo $rseditfetch["pincode"]; ?>" ></td></tr>

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