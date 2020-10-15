<?php
session_start();
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM tax where taxid='$_GET[delid]'";
	$delquery=mysqli_query($con,$sqldel);
	if(!$delquery)
	{
		echo "Failed to delete";
	}
	else
	{
		$res =  "Record deleted successfully";
		$resi = 1;
	}
}
$sql = "SELECT * FROM tax";
$selquery = mysqli_query($con,$sql);
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
        	<h1>View TAX</h1>
<?php
echo $res;
?>            
<table width="468" border="1" class="tftable">
  <tr>
    <th width="151" scope="col">&nbsp;Tax details</th>
    <th width="77" scope="col">&nbsp;Tax</th>
    <th width="91" scope="col">&nbsp;Status</th>       
     <th width="121" scope="col">&nbsp; Delete</th>

    
  </tr>
  <?php
  while($res = mysqli_fetch_array($selquery))
  {
	echo "<tr>

    <td>&nbsp;$res[taxdescription]</td>
    <td>&nbsp;$res[tax]</td>
    <td>&nbsp;$res[status]</td>
		<td>&nbsp;<a href='viewtax.php?delid=$res[taxid]'>Delete</a> | <a href='taxconfiguration.php?editid=$res[taxid]'>Edit</a>
		</td>	
  </tr>";
}
  ?>
</table>
</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>