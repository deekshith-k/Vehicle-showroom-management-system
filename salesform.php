<?php
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
$sql = "SELECT * FROM sales";
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
        	<h1>View sales</h1>
            <table width="200" border="1" class="tftable">
  <tr>
    <th scope="col">&nbsp;salesid</th>
    <th scope="col">&nbsp;vehid</th>
    <th scope="col">&nbsp;custid</th>
    <th scope="col">&nbsp;showroomid</th>
    <th scope="col">&nbsp;vehcost</th>
    <th scope="col">&nbsp;taxid</th>
    <th scope="col">&nbsp;ord_date</th>
    <th scope="col">&nbsp;deliver_date</th>
    <th scope="col">&nbsp;description</th>
    <th scope="col">&nbsp;status</th>
  </tr>


      <?php
  while($res = mysqli_fetch_array($selquery))
  {
	echo "<tr>    
	<td>&nbsp;$res[salesid]</td>   
	 <td>&nbsp;$res[vehid]</td>    
	 <td>&nbsp;$res[custid]</td>
	 <td>&nbsp;$res[showroomid]</td>
	 <td>&nbsp;$res[vehcost]</td>
	 <td>&nbsp;$res[taxid]</td>
   <td>&nbsp;$res[ord_date]</td>
   <td>&nbsp;$res[del_date]</td>
   <td>&nbsp;$res[description]</td>
    <td>&nbsp;$res[status]</td>
	<td>&nbsp;<a href='salesform.php?delid=$res[salesid]'>delete</a> | <a href='salesform.php?editid=$res[salesid]>Edit</a>
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