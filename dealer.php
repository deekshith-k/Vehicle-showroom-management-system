<?php
session_start(); 	
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
		 var alphaExp = /^[a-zA-Z]+$/;
	if(document.dealer.companyname.value == "")
	{
		alert("Please enter first name");
		document.dealer.companyname.focus();
		return false;
	}
	else if(document.dealer.fname.value == "")
	{
		alert("Please enter first name");
		document.dealer.fname.focus();
		return false;
	}
	else if(!document.dealer.fname.value.match(alphaExp))
	{
	alert("First name is not valid...");
	document.dealer.fname.value = "";
	document.dealer.fname.focus();
	return false;
	}
	else if(document.dealer.lname.value == "")
	{
		alert("Please enter last name");
		document.lname.focus();
		return false;
	}	
	else if(!document.dealer.lname.value.match(alphaExp))
	{
	alert("Last name is not valid...");
	document.dealer.lname.value = "";
	document.dealer.lname.focus();
	return false;
	}
	else if(document.dealer.username.value == "")
	{
		alert("Please enter Email ID");
		document.dealer.username.focus();
		return false;
	}

		else if(document.dealer.password.value == "")
	{
		alert("Password should not be empty");
		document.dealer.password.focus();
		return false;
	}
else if(document.dealer.password.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.dealer.password.focus();
		return false;
	}
	else if(document.dealer.password.value != document.dealer.cpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.dealer.newpassword.focus();
		return false;
	}	
	else if(document.dealer.address.value == "")
	{
		alert("Please enter Address");
		document.dealer.address.focus();
		return false;
	}
	else if(document.dealer.contno.value == "")
	{
		alert("Contact Number should not be empty...");
		document.dealer.contno.focus();
		return false;
	}
		else if(isNaN(document.dealer.contno.value))
	{
		alert("Contact Number not valid...");
		document.dealer.contno.focus();
		return false;
	}	
	else if(document.dealer.contno.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.dealer.contno.focus();
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
{
if(isset($_POST["submit"]))
{
	if(isset($_GET[editid]))
	{
		
		if($_FILES['compimg']['name'] != "")
		{
			$imgname = rand().$_FILES['compimg']['name'];
			move_uploaded_file($_FILES['compimg']['tmp_name'],"imgcompany/". $imgname);
			$result = mysqli_query($con,"INSERT INTO images(imagepath) values('$imgname')")  or mysqli_error($con);
			$imgid = mysqli_insert_id($con);
		}
		else
		{
			$imgid  = $_POST[compimg1];
		}
		$dt = date("Y-m-d");
		$result = mysqli_query($con,"UPDATE dealer SET adminid='$_SESSION[adminid]',imgid='$imgid',companyname='$_POST[companyname]',fname='$_POST[fname]',lname='$_POST[lname]',username='$_POST[username]',password='$_POST[password]',contactnumber='$_POST[contno]',address='$_POST[address]',createdat='$dt',status='$_POST[status]' where dealerid='$_GET[editid]'");
		if(!$result)
		{
			$resi=1;
			$res = "<br>Failed to update record";
		}
		else
		{
			$resi=1;
			$res = "<br><strong>Record updated successfully...</strong>"; 
		}
	}
	else
	{
		if($_FILES['compimg']['name'] != "")
		{
			$imgname = rand().$_FILES['compimg']['name'];
			move_uploaded_file($_FILES['compimg']['tmp_name'],"imgcompany/". $imgname);
			$result = mysqli_query($con,"INSERT INTO images(imagepath) values('$imgname')")  or mysqli_error($con);
			$imgid = mysqli_insert_id($con);
		}
		$dt = date("Y-m-d");
	$result=mysqli_query($con,"INSERT INTO dealer(adminid,imgid,companyname,fname,lname,username,password,contactnumber,address,createdat,status) values('$_SESSION[adminid]','$imgid','$_POST[companyname]','$_POST[fname]','$_POST[lname]','$_POST[username]','$_POST[password]','$_POST[contno]','$_POST[address]','$dt','$_POST[status]')");
	if(!$result)
		{
			$resi=1;
			$res = "failed to insert record";
		}
		else
		{
			$resi=1;
			$res = "<strong>Record inserted successfully...</strong>"; 
		}
	
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
        	<h1>Add Dealer</h1>
<form  name="dealer" method="post" action="" onsubmit="return validation()" enctype="multipart/form-data">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
<TABLE width="491" border=1 color=black class="tftable">
<?php
if($resi == 1)
{
?>
<tr>
<td colspan="2" align="center">
<?php
echo $res;
?></td>
</tr>
<?php
}
?>


<tr>
  <th>COMPANY NAME:</th><td><input type=text name=companyname value="<?php echo $rseditfetch["companyname"]; ?>" > </td></tr>

<tr>
  <th>FIRST NAME:</th><td><input type=text name=fname value="<?php echo $rseditfetch["fname"]; ?>" > </td></tr>

<tr>
  <th>LAST NAME:</th><td><input type=text name=lname value="<?php echo $rseditfetch["lname"]; ?>" > </td></tr>

<tr>
  <th>USER NAME:</th><td><input type=text name=username value="<?php echo $rseditfetch["username"]; ?>" > </td></tr>

<tr><th>PASSWORD:</th><td><input type=password name=password value="<?php echo $rseditfetch["password"]; ?>" > </td></tr>

<tr>
  <th>CONFIRM PASSWORD:</th><td><input type=password name=cpassword value="<?php echo $rseditfetch["password"]; ?>"  ></td></tr>

<tr><th>ADDRESS:</th><td><textarea name="address"><?php echo $rseditfetch["address"]; ?></textarea></td></tr>

<tr>
  <th>CONTACT NUMBER</th><td><input type=text name=contno value="<?php echo $rseditfetch["contactnumber"]; ?>" ></td></tr>

<tr>
  <th>UPLOAD LOGO</th><td>
  <input type="hidden" name="compimg1" id="compimg" value="<?php echo $rseditfetch[imgid]; ?>"  >
  <input type="file" name="compimg" id="compimg"  ><br />
  <?php
  		$sqlimg = "SELECT * FROM images where imgid='$rseditfetch[imgid]'";
		$selqueryimg = mysqli_query($con,$sqlimg); 
		$rsimg = mysqli_fetch_array($selqueryimg);
  ?>

<img src="imgcompany/<?php echo $rsimg[imagepath]; ?>" />
  </td></tr>

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

<tr ><td colspan=2 >
<center><input type=submit value=SUBMIT name=submit></center>
</td></tr>

</table>

</form>
  </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>