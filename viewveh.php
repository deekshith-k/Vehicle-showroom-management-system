<?php
session_start();
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM vehicle where vehid='$_GET[delid]'";
	$delquery=mysqli_query($con,$sqldel);
	if(!$delquery)
	{
		echo "Failed to delete record..";
	}
	else
	{
	echo "Record deleted successfully...";
	}
}

if(isset($_SESSION[dealerlogid]))
{
	$sql="SELECT dealer.*, vehicle.*, dealer.dealerid AS Expr1 FROM vehicle LEFT OUTER JOIN dealer ON vehicle.dealerid = dealer.dealerid
WHERE     (dealer.dealerid = '$_SESSION[dealerlogid]')";
}
else
{
	$sql="SELECT  vehicle.*, dealer.* FROM vehicle INNER JOIN dealer ON vehicle.dealerid = dealer.dealerid";
}
$selquery=mysqli_query($con,$sql);
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
        	<h1>View vehicles</h1>  
   <?php
  while($res = mysqli_fetch_array($selquery))
  {
	?>
<table width="675" border="1">
	<tr>
    <th width="157" scope="col">Dealer</th>
    <th width="238" scope="col">&nbsp;Vehicle details</th>
    <th width="116" scope="col">&nbsp;Vehicle cost</th>     
      <th width="121" scope="col">&nbsp; Status</th>
  </tr>
	<?php
	echo "<tr>
    <td>&nbsp;
	$res[fname] $res[lname]
	</td>
    <td>&nbsp;<strong>Vehicle name:</strong> $res[vehname]<br>
	&nbsp;<strong>Vehicle model:</strong> $res[vehmodel]<br>
    &nbsp;<strong>Vehicle Type:</strong> $res[vehtype]</td>
    <td>&nbsp;Rs. $res[vehcost]</td>
	<td>&nbsp;$res[createdat]<br>
	&nbsp;$res[status]<br>
	&nbsp;<a href='viewveh.php?delid=$res[vehid]'>delete</a> | <a href='addvehicles.php?editid=$res[vehid]'>Edit</a></td>
  </tr>";
  ?>
  	<tr>
	  <td colspan="9" scope="col" align="left"><strong>Description:</strong>&nbsp;<br />
<?php echo $res[vehdescription]; ?></td>
	  </tr>
        	<tr>
	  <td colspan="9" scope="col" align="left"><strong>Images:</strong>&nbsp;<br />
      <?php
	  $resimg="select * from images where vehid='$res[vehid]'";
	  $fetchqresult = mysqli_query($con,$resimg);	  
		if(mysqli_num_rows($fetchqresult) == 0)
		{
		echo "<img src='images/noimage.gif' height='80' width='85'></img>";
		}
			while($qresult = mysqli_fetch_array($fetchqresult))
			{
				echo "<img src='imgvehicle/$qresult[imagepath]'  height='80' width='85'></img>";
			}
	?>
      
      </td>
	  </tr>
  </table>
  <hr />
  <?php
  }
  ?>
  


</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>