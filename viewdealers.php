<?php
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM dealer where dealerid='$_GET[delid]'";
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
$sql = "SELECT * FROM dealer";
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
        	<h1>View dealers</h1>
<table width="666" border="1" class="tftable">
  <tr>
    <th width="118" scope="col">Logo</th>
    <th width="118" scope="col">Profile</th>
    <th width="181" scope="col">&nbsp;Contact details</th>
    <th width="197" scope="col">&nbsp;Logs</th>      
      <th width="142" scope="col">&nbsp; Action</th>

    
  </tr>
  <?php
  while($res = mysqli_fetch_array($selquery))
  {
	 	$sqlimg = "SELECT * FROM images where imgid='$res[imgid]'";
		$selqueryimg = mysqli_query($con,$sqlimg); 
		$rsimg = mysqli_fetch_array($selqueryimg);
	echo "<tr>
 	<td>&nbsp;
	<strong>$res[companyname]</strong> <br>
	<img src='imgcompany/$rsimg[imagepath]'></img></td>
    <td>&nbsp;<strong>Name :</strong> &nbsp;$res[fname]&nbsp;$res[lname]&nbsp;<hr>
	&nbsp;<strong>User name:</strong> $res[username]</td>
    <td><strong>Address-</strong><br>$res[address]<br><strong>Contact No-</strong><br>$res[contactnumber]&nbsp;</td>
    <td>&nbsp;<strong>Created at:</strong> <br>&nbsp;$res[createdat] <br>
	    &nbsp;<strong>Last Login:</strong> <br>&nbsp;$res[lastlogin]	</td>
		<td align='center'>&nbsp;<strong>Status:</strong> &nbsp;$res[status]<br>
		<a href='viewdealers.php?delid=$res[dealerid]'>delete</a> | <a href='dealer.php?editid=$res[dealerid]'>Edit</a>

	
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