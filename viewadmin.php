<?php
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM admin where adminid='$_GET[delid]'";
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
$sql = "SELECT * FROM admin";
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
        	<h1>View admin</h1>  
<table width="690" border="1" class="tftable">
  <tr>
    <th width="100" align="center">&nbsp;Admin name</th>
    <th width="120" scope="col">&nbsp;Username</th>
    <th width="140" scope="col">&nbsp; Contact No.</th>
    <th width="120" scope="col">&nbsp; Account details</th>
    <th width="86" scope="col">&nbsp; Status</th>
        <th width="137" scope="col">&nbsp; Delete</th>

  </tr>
  <?php
  while($res = mysqli_fetch_array($selquery))
  {
	echo "<tr>    
	<td>&nbsp;$res[adminname]</td>   
	 <td>&nbsp;$res[username]</td>    
	 <td>&nbsp;$res[contactnumber]</td>
    <td>
	Created at: &nbsp;<br>$res[createdat] <br>
	Last login: &nbsp;<br>$res[lastlogin]</td>
    <td>&nbsp;$res[status]</td>
	<td>&nbsp;<a href='viewadmin.php?delid=$res[adminid]'>delete</a> | <a href='admin.php?editid=$res[adminid]'>Edit</a>
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