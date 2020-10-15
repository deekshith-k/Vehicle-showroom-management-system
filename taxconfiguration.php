<?php
session_start();
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.taxcon.taxdescription.value == "")
	{
		alert("Enter tax description");
		document.taxcon.taxdescription.focus();
		return false;
	}
	else if(document.taxcon.tax.value == "")
	{
		alert("Please enter tax");
		document.taxcon.tax.focus();
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

if(isset($_POST["register"]))
{
	
	if(isset($_GET[editid]))
	{
		$result = mysqli_query($con,"UPDATE tax SET taxdescription='$_POST[taxdescription]',tax='$_POST[tax]',status='$_POST[status]' where taxid='$_GET[editid]'");
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
		$result = mysqli_query($con,"INSERT INTO tax(taxdescription,tax,status) values('$_POST[taxdescription]','$_POST[tax]','$_POST[status]')");
		if(!$result)
		{
			$res = "<br>Failed to insert record";
		}
		else
		{
			$res = "<br>Record inserted successfully..."; 
		}
	}
}
$_SESSION["setid"]=rand();

$sql = "SELECT * FROM tax where taxid='$_GET[editid]'";
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
        	<h1>TAX</h1>  

<form name="taxcon" method=post action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION["setid"]; ?>" />
<TABLE width="411" height="215" border=1 color=black class="tftable">
<tr><td colspan="2" align="center"><strong> TAX Details</strong><?php echo $res; ?></td></tr>

<tr>
  <th>TAX DETAILS:</th><td><input name=taxdescription type="text" size="40" value="<?php echo $rseditfetch["taxdescription"]; ?>" ></td></tr>

<tr><th>TAX:</th><td><input type=text name=tax value="<?php echo $rseditfetch["tax"]; ?> " />
  (In percentage)</td></tr>


<tr><th>STATUS:</th><td>
<select name=status>
<option value="">Select</option>
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

<tr ><td colspan=2 ><center><input type=submit value=SUBMIT name=register></center></td></tr>

</table>

</form>

</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>