<?php
session_start();
include("header.php"); //Developed by www.freestudentprojects.com
include("dbconnection.php");
//left join
/*$sql = "SELECT sales.*,showroom.*,customer.*,vehicle.*,tax.*,dealer.*,images.* FROM sales INNER JOIN showroom INNER JOIN customer INNER JOIN vehicle INNER JOIN tax INNER JOIN dealer INNER JOIN images ON sales.vehid=vehicle.vehid AND sales.custid=customer.custid AND sales.showroomid=showroom.showroomid AND  sales.taxid = tax.taxid AND images.vehid=vehicle.vehid AND dealer.dealerid=vehicle.dealerid where sales.salesid='$_GET[viewid]'";
$resultorders = mysqli_query($con, $sql);
$rsorders = mysqli_fetch_array($resultorders);
*/

//orderstatus
if(isset($_POST[submitorderst]))
{
	$sql1 = "UPDATE sales SET status='$_POST[orderstatus]' where salesid='$_POST[orderstid]'";
	if(!mysqli_query($con, $sql1))
	{
		mysqli_error($con);
	}
	else
	{
	?>
	<script type="application/javascript">
		alert("Order status updated successfully..");
	</script>
	<?php
	}
}

//Sales details
$sql = "SELECT * FROM sales where salesid='$_GET[viewid]'";
$resultorders = mysqli_query($con, $sql);
$rsorders = mysqli_fetch_array($resultorders);

//customer details
$sqlcust = "SELECT * FROM customer where custid='$rsorders[custid]'";
$resultcust = mysqli_query($con, $sqlcust);
$rscust = mysqli_fetch_array($resultcust);

//Vehicle details
$sqlveh = "SELECT * FROM vehicle where vehid='$rsorders[vehid]'";
$resultveh = mysqli_query($con, $sqlveh);
$rsveh = mysqli_fetch_array($resultveh);

//Dealer details
$sqldealer = "SELECT * FROM  `dealer` where dealerid='$rsveh[dealerid]'";
$resultdealer = mysqli_query($con, $sqldealer);
$rsdealer = mysqli_fetch_array($resultdealer);

//Showroom details
$sqlshowroom = "SELECT * FROM  showroom where dealerid='$rsveh[dealerid]'";
$resultshowroom = mysqli_query($con, $sqlshowroom);
$rsshowroom = mysqli_fetch_array($resultshowroom);

?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        
        <div id="content" class="float_r">
        	<h1>Vehicle orders</h1>

        <div class="cleaner"></div>
        <blockquote>
          <h3>Customer details:</h3>
          <table width="571" border="1">
            <tr>
              <th width="171" scope="row">Customer name: </th>
              <td width="384">&nbsp; <?php echo ucfirst($rscust[fname]) . " ". ucfirst($rscust[lname]); ?></td>
            </tr>
            <tr>
              <th width="171" scope="row">Address: </th>
              <td width="384">&nbsp;
			  		<?php echo $rscust[address]; ?><br />
					&nbsp; City: <?php echo $rscust[city]; ?><br />
     				&nbsp; State: <?php echo $rscust[state]; ?><br />
     				&nbsp; Country: <?php echo $rscust[country]; ?><br />                    
     				&nbsp; PIN Code: <?php echo $rscust[pincode]; ?><br />                    
              </td>
            </tr>
            <tr>
              <th scope="row">Contact No.</th>
              <td>&nbsp;<?php echo $rscust[contactno]; ?>
               </td>
            </tr>
            <tr>
              <th scope="row">Email ID</th>
              <td>&nbsp;<?php echo $rscust[emailid]; ?></td>
            </tr>
          </table>
          <hr />
          <h3>Vehicle details:</h3>
          <table width="571" border="1">
            <tr>
    <th width="171" scope="row">Vehicle name: </th>
    <td width="384">&nbsp;<?php echo $rsveh[vehname]; ?></td>
  </tr>
  <tr>
    <th width="171" scope="row">Company name: </th>
    <td width="384">&nbsp;
    
	<?php echo $rsdealer[companyname]; ?>
    </td>
  </tr>
  
  <tr>
    <th scope="row">Image</th>
    <td>&nbsp;
	<?php

$sql1 = "SELECT * FROM images where vehid='$rsveh[vehid]'  ORDER BY RAND( ) LIMIT 0 , 1";
$resultorders1 = mysqli_query($con, $sql1);
$rsorders1 = mysqli_fetch_array($resultorders1);
		if($rsorders1[imagepath]!="")
		{
		echo "<img src='imgvehicle/$rsorders1[imagepath]' width='200' height='150' />";
		}
		else
		{
		echo "<img src='images/vehiclebg.jpg'  width='200' height='150' />";
		}
	?>
                </td>
  </tr>
  <tr>
    <th scope="row">Vehicle model</th>
    <td>&nbsp;<?php echo $rsveh[vehmodel]; ?></td>
  </tr>
  <tr>
    <th scope="row">Vehicle type</th>
    <td>&nbsp;<?php echo $rsveh[vehtype]; ?></td>
  </tr>
</table>
<hr />
<h3>Showroom details:</h3>
          <table width="573" border="1">
            <tr>
              <th width="168" height="37" scope="row">Showroom Name</th>
              <td width="389">&nbsp;<?php echo $rsshowroom[showroomname]; ?></td>
            </tr>
            <tr>
              <th height="39" scope="row">Showroom address</th>
              <td>&nbsp;<?php echo $rsshowroom[address]; ?><br> City <?php echo $rsshowroom[city]; ?><br> State <?php echo $rsshowroom[state]; ?><br> PIN Code: <?php echo $rsshowroom[pincode]; ?></td>
            </tr>
            <tr>
              <th height="40" scope="row">Contact Number</th>
              <td>&nbsp;<?php echo $rsshowroom[contactno]; ?></td>
            </tr>
          </table>
<hr />
          <h3>Vehicle Cost:</h3>
          <table width="576" border="1">
            <tr>
              <th width="167" scope="row">Vehicle cost</th>
              <td width="357">&nbsp;Rs. <?php echo $rsorders[vehcost]; ?></td>
            </tr>
            <tr>
              <th scope="row">Tax - <?php echo $rsorders[tax]; ?> %</th>
              <td>&nbsp;Rs. <?php echo $tottax = ($rsorders[vehcost] * $rsorders[tax])/100; ?></td>
            </tr>
            <tr>
              <th scope="row">Total Cost</th>
              <td>&nbsp;Rs. <?php echo $totalvehcost = $tottax + $rsorders[vehcost]; ?></td>
            </tr>
          </table>
          <hr /><h3>Purchase Details:</h3></p>
          <table width="578" border="1">
            <tr>
              <th width="169" height="22" scope="row">Order Date</th>
              <td width="377">&nbsp;<?php echo $rsorders[ord_date]; ?></td>
            </tr>
            <tr>
              <th scope="row">Delivery Date</th>
              <td>&nbsp;<?php echo $rsorders[del_date]; ?></td>
            </tr>
            <tr>
              <th scope="row">Order status</th>
              <td>&nbsp;<h2><?php echo $rsorders[9]; ?></h2></td>
            </tr>
            <tr>
              <th scope="row">Comments</th>
              <td>&nbsp;<?php echo $rsorders[8]; ?></td>
            </tr>
<?php
if(isset($_SESSION[dealerlogid]))
{    
?>        
            <tr>
              <th scope="row">Update order status</th>
              <td>&nbsp;

              	<form method="post" action="">
                	<input type="hidden" name="orderstid" value="<?php echo $rsorders[salesid]; ?>" />
					<select name="orderstatus" >
					<option value="">Select</option>
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Delivered">Delivered</option>
                    </select><br />
                    <input type="submit" name="submitorderst" value="Update order status" />
                </form>
             
              </td>
            </tr>
<?php
}
?>
          </table>
          
          <br />
          <button onclick="myFunction()">Print this report</button>

<script>
function myFunction()
{
window.print();
}
</script>
          </p>
        
        
        </blockquote>
               
               
      </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>