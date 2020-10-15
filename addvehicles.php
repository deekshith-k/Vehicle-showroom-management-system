<?php
session_start();
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.addveh.vehname.value=="")
	{
		alert("Please enter vehiclename");
		document.addveh.vehname.focus();
		return false;
	}
	else if(document.addveh.model.value=="")
	{
		alert("Please enter model");
		document.addveh.model.focus();
		return false;
	}
	else if(document.addveh.vehdesptn.value=="")
	{
		alert("Please enter vehicle description");
		document.addveh.vehdesptn.focus();
		return false;
	}
	else if(document.addveh.vehcost.value=="")
	{
		alert("Please enter vehicle cost");
		document.addveh.vehcost.focus();
		return false;
	}
	else if(document.addveh.vehcost.value==0)
	{
		alert("Please enter valid cost");
		document.addveh.vehcost.focus();
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
if(isset($_POST[register]))
{
	if(isset($_GET[editid]))
		{
			$result = mysqli_query($con,"UPDATE vehicle SET vehname='$_POST[vehname]',vehmodel='$_POST[model]',vehtype='$_POST[type]',vehdescription='$_POST[vehdesptn]',vehcost='$_POST[vehcost]',createdat='$_POST[createdat]',status='$_POST[status]' where vehid='$_GET[editid]'");
			if(!$result)
			{
				$res = "<br>Failed to update record";
			}
			else
			{
				$res = "<br>Record updated successfully..."; 
			}
			$lastid = $_GET[editid];
			$countimg =count($_FILES['uploadimg']['name']);
			if($_FILES['uploadimg']['name'][0] != "")
			{
				for($i=0;$i<count($countimg); $i++)
				{				
					$imgname = rand().$_FILES['uploadimg']['name'][$i];
					move_uploaded_file($_FILES['uploadimg']['tmp_name'][$i],"imgvehicle/". $imgname);
					$result = mysqli_query($con,"INSERT INTO images(imagename,vehid,imagepath,defaultimg) values('$imgname','$lastid','$imgname','0')");
				}
			}
		}
		else
		{
				$date=date("Y-m-d");
$result = mysqli_query($con,"INSERT INTO vehicle(vehname,dealerid,vehmodel,vehtype,vehdescription,vehcost,createdat,status) values('$_POST[vehname]','$_SESSION[dealerlogid]','$_POST[model]','$_POST[type]','$_POST[vehdesptn]','$_POST[vehcost]','$date','$_POST[status]')");
			if(!$result)
			{
				$res = "failed to insert record";
			}
			else
			{
				$res = "Record inserted successfully..."; 
			}
			$lastid = mysqli_insert_id($con);
			if($_FILES['uploadimg']['name'][0] != "")
			{
				for($i=0;$i<count($_FILES['uploadimg']['name']); $i++)
				{				
					$imgname = rand().$_FILES['uploadimg']['name'][$i];
					move_uploaded_file($_FILES['uploadimg']['tmp_name'][$i],"imgvehicle/". $imgname);
					$result = mysqli_query($con,"INSERT INTO images(imagename,vehid,imagepath,defaultimg) values('$imgname','$lastid','$imgname','0')");
				}
			}
		}
}

$_SESSION["setid"] = rand();
$sql = "SELECT * FROM vehicle where vehid='$_GET[editid]'";
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
        	<h1>Add Vehicles</h1>
<form name="addveh" method=post action="" enctype="multipart/form-data" onsubmit="return validation()">
<input type="hidden" name="dbimg1" value="<?php echo $rseditfetch["vehimg1"]; ?>" />

<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
<TABLE width="561" height="357" border=1 color=black class="tftable">
<?php
if(isset($res))
{
?>
<tr><td colspan="2"><?php echo $res; ?></td></tr>
<?php
}
?>
<tr><th width="241">VEHICLENAME:</th><td width="257"><input type=text name=vehname value="<?php echo $rseditfetch["vehname"]; ?>" ></td></tr>

<tr><th>MODEL:</th><td><input type=text name=model value="<?php echo $rseditfetch["vehmodel"]; ?>" ></td></tr>

<tr><th>VEHICLE TYPE:</th><td>
<select name="type" id="type">
	<option>Select</option>
    <?php
$arr = array("Petrol","Diesel", "Petrol and Diesel");
foreach($arr as $value)
{
	if($value== $rseditfetch["vehtype"])
	{
	echo "<option value='$value' selected>$value</option>";
	}	
	else
	{
	echo "<option value='$value'>$value</option>";
	}
}
?>
</select></td></tr>


<tr>
  <th align="left" valign="top">IMAGE <br /></th>
  <td><input type="file" name="uploadimg[]" id="uploadimg[]" multiple="multiple" />    <br />
  (Hold Ctrl button to select multiple images)
  </td>
</tr>
<tr><th align="left" valign="top">VEHICLE DESCRIPTION:</th><td>
  <textarea name="vehdesptn" cols="40" rows="5"><?php echo $rseditfetch["vehdescription"]; ?></textarea></td></tr>

<tr><th>COST:</th><td><input type=text name=vehcost value="<?php echo $rseditfetch["vehcost"]; ?>"></td></tr>


<tr><th>STATUS:</th><td>
<select name=status>
<?php
$arr = array("Select","Enabled","Disabled");
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

<?php
if(isset($_GET[editid]))
{
?>
<h1>Vehicle images:</h1>
<?php
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM images where imgid='$_GET[delid]'";
	$delquery=mysqli_query($con,$sqldel);
	if(!$delquery)
	{
		echo "Failed to delete image..";
	}
	else
	{
	echo "Image deleted successfully...";
	}
}

?>
<table width="497" border="1">
<?php

$resimg="select * from images where vehid='$_GET[editid]'";
$fetchqresult = mysqli_query($con,$resimg);	  
	while($qresult = mysqli_fetch_array($fetchqresult))
	{
		
?>
				
	<tr>
	<td width="121" align="left" scope="col">
<?php

	echo "<img src='imgvehicle/$qresult[imagepath]'  height='160' width='205'></img>";
?>      
      </td>
      	<td width="150" align="left" scope="col">
		
<a href="addvehicles.php?delid=<?php echo $qresult[imgid]; ?>&editid=<?php echo $_GET[editid]; ?>">Delete this image.. </a>

</td>
	  </tr>
<?php
	}
?>      
  </table>
<?php
}
?>



</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>