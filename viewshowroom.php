<?php
session_start();
include("dbconnection.php");

if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM showroom where showroomid='$_GET[delid]'";
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
	$sql="select * from showroom where dealerid='$_SESSION[dealerlogid]'";
}
else
{
	$sql="select * from showroom";
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
        	<h1>View Showroom</h1>  
<table width="636" border="1" class="tftable">
  <tr>
    <th width="195" scope="col">&nbsp;Showroom Name </th>
    <th width="191" scope="col">&nbsp;Contact information</th>
    <th width="102" scope="col">&nbsp;Status</th>
    <th width="120" scope="col">&nbsp;Action</th>    
  </tr>
  <?php
  while($res=mysqli_fetch_array($selquery))
  {
  echo" <tr>
   
	<td>&nbsp;
	<strong>$res[showroomname]</strong><br>";
	
	if($res[imagepath] == "")
	{
	echo "<img src='images/noimage.gif' height='80' width='85'></img>";
	}
	else
	{
	echo "<img src='imgshowroom/$res[imagepath]'  height='80' width='85'></img>";
	}
	
	echo "</td>
    <td>$res[address]&nbsp;
	<br>City: $res[city]&nbsp;
	<br>State: $res[state]
	<br> PIN: $res[pincode]
	<br> <strong>Ph. No. </strong>$res[contactno]
	</td>
    
    <td>&nbsp;$res[status]</td>
	<td>&nbsp;<a href='viewshowroom.php?delid=$res[showroomid]'>Delete</a> | <a href='showroom.php?editid=$res[showroomid]'>Edit</a>
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