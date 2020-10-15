<?php
session_start();
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM sales where salesid='$_GET[delid]'";
	$delquery=mysqli_query($con,$sqldel);
	if(!$delquery)
	{
		echo "Failed to delete";
	}
	else
	{
		echo "record deleted successfully";
	}
}
if(isset($_SESSION[dealerlogid]))
{
$sql = "SELECT     sales.*, vehicle.*, showroom.*, customer.*, dealer.* FROM sales INNER JOIN vehicle ON sales.vehid = vehicle.vehid INNER JOIN showroom ON sales.showroomid = showroom.showroomid INNER JOIN customer ON sales.custid = customer.custid INNER JOIN dealer ON vehicle.dealerid = dealer.dealerid where dealer.dealerid='$_SESSION[dealerlogid]' ORDER BY vehicle.vehname DESC";
}
else if(isset($_SESSION[loginid]))
{
$sql = "SELECT     sales.*, vehicle.*, showroom.*, customer.*, dealer.* FROM sales INNER JOIN vehicle ON sales.vehid = vehicle.vehid INNER JOIN showroom ON sales.showroomid = showroom.showroomid INNER JOIN customer ON sales.custid = customer.custid INNER JOIN dealer ON vehicle.dealerid = dealer.dealerid where sales.custid='$_SESSION[loginid]' ORDER BY vehicle.vehname DESC";
}
else
{
$sql = "SELECT     sales.*, vehicle.*, showroom.*, customer.*, dealer.* FROM sales INNER JOIN vehicle ON sales.vehid = vehicle.vehid INNER JOIN showroom ON sales.showroomid = showroom.showroomid INNER JOIN customer ON sales.custid = customer.custid INNER JOIN dealer ON vehicle.dealerid = dealer.dealerid
ORDER BY vehicle.vehname DESC";
}
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
        	<h1>View Ordered vehicles</h1>
<table width="468" border="1" color=black class="tftable">
  <tr>
    	<th width="63" scope="col" align="center">&nbsp;Order ID</th>
    	<th width="85" scope="col" align="center">&nbsp;Vehicle details</th>
    	<th width="87" scope="col" align="center">&nbsp;Customer details</th>       
     	<th width="99" scope="col" align="center">&nbsp; Showroom details</th>
     	<th width="78" scope="col" align="center">&nbsp; Vehicle cost</th>
     	<th width="88" scope="col" align="center">&nbsp; Order status</th>
        <th width="63" scope="col" align="center">&nbsp; Action</th>
  </tr>
  <?php
  while($res = mysqli_fetch_array($selquery))
  {
	echo "<tr>
	<td>&nbsp;$res[salesid]</td>
	    <td>&nbsp;$res[vehname]</td>
    <td>&nbsp;$res[30] $res[31]</td>
    <td>&nbsp;$res[21]</td>
    <td>
	Vehicle cost: &nbsp;$res[vehcost]</td>
    <td>
	&nbsp;$res[ord_date]
	<br>
	&nbsp;$res[status]</td>
	<td>&nbsp;<a href='vehicleorders.php?viewid=$res[salesid]'>More</a></td>
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