<?php
include("dbconnection.php");

if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM customer where custid='$_GET[delid]'";
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

$sql="select * from customer";
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
        	<h1>View customers</h1>  
<table width="680" border="1" class="tftable">
  <tr>
    <th width="63" scope="col">&nbsp;Profile </th>
    <th width="68" scope="col">&nbsp;Contact details</th>
    <th width="102" scope="col">&nbsp;Account details</th>
    <th width="88" scope="col">&nbsp;Action</th>
  </tr>
  <?php
  while($res=mysqli_fetch_array($selquery))
  {
  echo" <tr>
    <td>&nbsp;Name: $res[fname]&nbsp;$res[lname]<br>
	Gender: &nbsp;$res[gender]
	</td>
    <td><strong>Address</strong><br>$res[address]&nbsp;<br>	$res[city]&nbsp;<br>	State: $res[state]&nbsp;<br>	PIN: $res[pincode] <br>
	<strong>Contact No.</strong> $res[contactno] <br>
	<strong>Email ID:</strong> $res[emailid] <br>
	</td>
    <td>
	&nbsp; Created at: $res[createdat]<br>
	&nbsp; Last login : $res[lastlogin]<br>
	&nbsp; Status : $res[status]</td>
	<td>&nbsp;<a href='viewcustomer.php?delid=$res[custid]'>Delete</a> 
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