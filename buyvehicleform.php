<?php
session_start(); 
?>
<script type="application/javascript">
function validation()
{
	if(document.buyveh.description.value=="")
	{
		alert("Please enter comment");
		document.buyveh.description.focus();
		return false;
	}
	else
	{
		return true;
	}

}
	</script>
	<?php	
if(!isset($_SESSION[loginid]))
{
	header("Location: login.php?vid=$_GET[vid]&showroomid=$_GET[showroomid]");
}
include("dbconnection.php");
$date=date("Y-m-d");
if($_SESSION["setid"] == $_POST["setid"])
{

if(isset($_POST["submit"]))
{	
	if(isset($_GET[editid]))
	{
		$result = mysqli_query($con,"UPDATE sales SET salesid='$_POST[salesid]',vehid='$_POST[vehid]',custid='$_POST[custid]',showroomid='$_POST[showroomid]',vehcost='$_POST[vehcost]',taxid='$_POST[taxid]','$date','$date',description='$_POST[description]',status='$_POST[status]' where salesid='$_GET[editid]'");
		if(!$result)
		{
			$res = "<br>Failed to update record";
		}
		else
		{
			$res = "<br>Record updated successfully..."; 
		}
	}
	else
	{
	$result=mysqli_query($con,"INSERT INTO sales(salesid,vehid,custid,showroomid,vehcost,taxid,ord_date,del_date,description,status) values('$_POST[salesid]','$_POST[vehid]','$_SESSION[loginid]','$_POST[showroomid]','$_POST[vehcost]','$_POST[taxid]','$_POST[ord_date]','$_POST[del_date]','$_POST[description]','Pending')");
	if(!$result)
		{
			echo  "failed to insert record".mysqli_error($con);
		}
		else
		{
			$resi=1;
			$res = "<h1><font color='green'>Vehicle order sent successfully..."; 
			$res = $res . "<br><br>Your Order ID is :". mysqli_insert_id($con). "</font></h1>";
			$msg = "Vehicle order sent successfully...\n Your Order ID is : ". mysqli_insert_id($con);
			$sql = "SELECT * FROM customer WHERE custid='$_SESSION[loginid]'";
			$qresult = mysqli_query($con,$sql);
			$logrec = mysqli_fetch_array($qresult);
				
			mail($logrec[emailid],"Vehicle order details" ,"$msg","From: aravinda@technopulse.in");
		}
	
	}
	
}
}



$_SESSION["setid"] = rand();

$sql = "SELECT * FROM customer where custid='$_SESSION[loginid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);

$sql = "SELECT * FROM vehicle LEFT JOIN dealer ON vehicle.dealerid=dealer.dealerid where vehicle.vehid='$_GET[vid]'";
$selvehquery = mysqli_query($con,$sql);
$rsvehquery = mysqli_fetch_array($selvehquery);

include("header.php"); //Developed by www.freestudentprojects.com
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
			include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
<h1>Buy Vehicle</h1>

<table width="540" border="0">
<?php
if($resi == 1)
{
echo "<tr><td>";
echo $res;
echo "</td></tr>";
}
else
{
?>
<tr>
<td>
<form name="buyveh" method="post" action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
<h3>CUSTOMER DETAILS</h3>
<TABLE width="529" border=1 color=black class="tftable" >
<tr><th width="167"><strong>NAME:</strong></th><td width="346"> <?php echo $rseditfetch["fname"]; ?></td></tr>

<tr><th><strong>CONTACTNO:</strong></th><td> <?php echo $rseditfetch["contactno"]; ?></td></tr>

<tr><th height="24"><strong>EMAILID:</strong></th><td> <?php echo $rseditfetch["emailid"]; ?> </td></tr>

<tr><th><strong>ADDRESS:</strong></th><td> <?php echo $rseditfetch["address"]; ?></td></tr>

</TABLE>
<hr />
<H3>VEHICLE INFORMATION</H3>
<TABLE width="526" border=1 color=black class="tftable">

<tr><th width="173"><strong>VEHICLE NAME:</strong></th><td width="337"><?php echo $rsvehquery["vehname"]; ?> </td></tr>

<tr><th><strong>MODEL:</strong></th><td><?php echo $rsvehquery["vehmodel"]; ?> </td></tr>

<tr><th><strong>COMPANY:</strong></th><td><?php echo $rsvehquery["companyname"]; ?> </td></tr>


<tr><th><strong>VEHICLE TYPE:</strong></th><td><?php echo $rsvehquery["vehtype"]; ?> </td></tr>

</TABLE>
<hr />

<H3>ORDER DETAILS</H3>
<TABLE width="525" border=1 color=black class="tftable">

<tr><th width="180"><strong>VEHICLE COST:</strong></th><td width="329"> &nbsp; Rs. <?php echo $vehcost = $rsvehquery["vehcost"]; ?> </td></tr>
<?php
$sqlstatement = "SELECT * FROM  tax where status='Enabled'";
$seltaxquery = mysqli_query($con,$sqlstatement);
$rstaxfetch = mysqli_fetch_array($seltaxquery);
?>
<tr>
  <th><strong>TAX: <?php echo $rstaxfetch["tax"]; ?> %</strong></th><td>&nbsp; Rs. <?php echo $tottax =  ($rsvehquery["vehcost"]  *$rstaxfetch["tax"])/100; ?></td></tr>

<tr>
  <th><strong>TOTAL COST:</strong></th>
  <td>&nbsp; Rs. <?php echo $vehcost + $tottax  ; ?></td>
</tr>
<tr><th><strong>ORDER DATE:</strong></th><td>&nbsp; <?php echo date("d-m-Y"); ?></td></tr>


<tr><th><strong>DELIVER DATE:</strong></th><td>&nbsp; 
<?php 
$tomorrow = mktime(0,0,0,date("m"),date("d")+15,date("Y"));
echo date("d/m/Y", $tomorrow);
$orddate = date("Y-m-d");
$tomorrow = mktime(0,0,0,date("m"),date("d")+15,date("Y"));
$deldate = date("Y-m-d", $tomorrow);
 ?> </td></tr>

<tr>
  <th><strong>COMMENTS:</strong></th>
  <td><textarea name="description"></textarea></td></tr>

</TABLE>

<table align="center">
<tr ><td colspan=2 align="center" >
<br>
<input type="hidden" name="vehid" value="<?php echo $rsvehquery["vehid"]; ?>">
<input type="hidden" name="custid" value="<?php echo $rsvehquery["custid"]; ?>">
<input type="hidden" name="showroomid" value="<?php echo $_GET["showroomid"]; ?>">
<input type="hidden" name="vehcost" value="<?php echo $rsvehquery["vehcost"]; ?>">
<input type="hidden" name="taxid" value="<?php echo $rstaxfetch[0]; ?>">
<input type="hidden" name="ord_date" value="<?php echo $orddate; ?>">
<input type="hidden" name="del_date" value="<?php echo $deldate; ?>">
<input type="hidden" name="status" value="<?php echo $rsvehquery["status"]; ?>">
<input type=submit value="Click here to confirm your order" name="submit"></td></tr>
</table>
</form>
</td>
</tr>
<?php
}
?>
</table>

  </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>