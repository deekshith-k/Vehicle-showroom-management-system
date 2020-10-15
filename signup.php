<?php
session_start();
?>
<script type="application/javascript">
function validation()
{
	 var alphaExp = /^[a-zA-Z]+$/;
	 
	if(document.signupform.firstname.value == "")
	{
		alert("Please enter first name");
		document.signupform.firstname.focus();
		return false;
	}
	else if(!document.signupform.firstname.value.match(alphaExp))
	{
	alert("First name is not valid...");
	document.signupform.firstname.value = "";
	document.signupform.firstname.focus();
	return false;
	}
	else if(document.signupform.lastname.value == "")
	{
		alert("Please enter last name");
		document.signupform.lastname.focus();
		return false;
	}
	else if(!document.signupform.lastname.value.match(alphaExp))
	{
	alert("last name is not valid...");
	document.signupform.lastname.value = "";
	document.signupform.lastname.focus();
	return false;
	}
	else if(document.signupform.address.value == "")
	{
		alert("Please enter Address");
		document.signupform.address.focus();
		return false;
	}
		else if(document.signupform.city.value == "")
	{
		alert("Please enter city");
		document.signupform.city.focus();
		return false;
	}
	else if(!document.signupform.city.value.match(alphaExp))
	{
	alert("city is not valid...");
	document.signupform.city.value = "";
	document.signupform.city.focus();
	return false;
	}
		else if(document.signupform.pincode.value == "")
	{
		alert("Please enter PIN Code");
		document.signupform.pincode.focus();
		return false;
	}
	else if(isNaN(document.signupform.pincode.value))
	{
		alert("Pincode not valid...");
		document.signupform.pincode.focus();
		return false;
	}	
			else if(document.signupform.country.value == "")
	{
		alert("Please enter country");
		document.signupform.country.focus();
		return false;
	}
	else if(!document.signupform.country.value.match(alphaExp))
	{
	alert("Country is not valid...");
	document.signupform.country.value = "";
	document.signupform.country.focus();
	return false;
	}
		else if(document.signupform.state.value == "")
	{
		alert("Please enter state");
		document.signupform.state.focus();
		return false;
	}
	else if(!document.signupform.state.value.match(alphaExp))
	{
	alert("State is not valid...");
	document.signupform.state.value = "";
	document.signupform.state.focus();
	return false;
	}
	else if(document.signupform.emailid.value == "")
	{
		alert("Please enter Email ID");
		document.signupform.emailid.focus();
		return false;
	}

		else if(document.signupform.newpassword.value == "")
	{
		alert("Password should not be empty");
		document.signupform.newpassword.focus();
		return false;
	}
else if(document.signupform.newpassword.value.length <8)
	{
		alert("Password should not be less than 8 characters");
		document.signupform.newpassword.focus();
		return false;
	}
	else if(document.signupform.newpassword.value != document.signupform.confirmpassword.value)
	{
		alert("Password and confirm password not matching.");
		document.signupform.newpassword.focus();
		return false;
	}	
	else if(document.signupform.ContactNo.value == "")
	{
		alert("Contact Number should not be empty...");
		document.signupform.ContactNo.focus();
		return false;
	}
	else if(isNaN(document.signupform.ContactNo.value))
	{
		alert("Contact Number not valid...");
		document.signupform.ContactNo.focus();
		return false;
	}	
	else if(document.signupform.ContactNo.value.length <9)
	{
		alert("Contact number should not be less than 8");
		document.signupform.ContactNo.focus();
		return false;
	}
		else if(document.signupform.termcondition.checked == false)
	{
		alert("Please accept our terms and conditions..");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
include("dbconnection.php");
$date=date("Y-m-d");
if($_SESSION["setid"]==$_POST["setid"])
{
		if(isset($_POST["register"]))
		{
				if(isset($_GET[editid]))
				{
$result = mysqli_query($con,"UPDATE customer SET fname='$_POST[firstname]',lname='$_POST[lastname]',contactno='$_POST[ContactNo]',emailid='$_POST[emailid]',password='$_POST[newpassword]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',country='$_POST[country]' ,pincode='$_POST[pincode]', gender='$_POST[gender]',createdat='$_POST[createdat]',status='$_POST[status]' where custid='$_GET[editid]'");
					if(!$result)
					{
						$res = "<br>Failed to update record";
					}
					else
					{
						$res = "<br><font color='green'>Record updated successfully...</font>"; 
					}
				}
				else
				{
						
			$result=mysqli_query($con,"INSERT INTO customer(fname,lname,emailid,password,contactno,address,city,country,state,pincode,gender,createdat,status) values('$_POST[firstname]','$_POST[lastname]','$_POST[emailid]','$_POST[newpassword]','$_POST[ContactNo]','$_POST[address]','$_POST[city]','$_POST[country]','$_POST[state]','$_POST[pincode]','$_POST[gender]','$date','Enabled')");			
					if(!$result)
					{
						$rest = 1;
						$res = "failed to insert record".mysqli_error($con);
					}
					else
					{
						$rest = 1;
						$res = "<font color='green'>User registered successfully...</font><br>"; 
						$res = $res. "<font color='green'><h2><a href='login.php'>Click here to Login</a></h2></font>"; 					
					}
				}
		}
}
include("header.php"); //Developed by www.freestudentprojects.com
	$_SESSION["setid"]=rand();
	$sql = "SELECT * FROM customer where custid='$_GET[editid]'";
	$seleditquery = mysqli_query($con,$sql);
	$rseditfetch = mysqli_fetch_array($seleditquery);
?>
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
		<?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h2>New Account</h2>
            <h5><strong>Please enter following details</strong></h5>
            <div class="content_half float_l checkout">
            <?php
			if($rest==1)
			{
				echo $res;
			?>
          </div>
            
            <div class="content_half float_r checkout">
            </div>
            
            <div class="cleaner h50"></div>
			</div> 
            <?php
			}
			else
			{
			?>
            <form name="signupform" method="post" action="" onsubmit="return validation()">
            <input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" />
				FIRST NAME:  
                  <input type="text" name="firstname"  style="width:300px;"  />
                <br />
                <br />
                LAST NAME:
				<input type="text" name="lastname"  style="width:300px;"  />
          
                
                 <br />
                <br />
                ADDRESS:
        <textarea name="address" rows="5" cols="35"></textarea>
         <br />
                <br />
                CITY:
                <input type="text" name="city"  style="width:300px;"  /> 
                                <br />  <br />
                PIN CODE:
                <input type="text" name="pincode"  style="width:300px;"  />
              
                <br /> <br />
				                COUNTRY:
                <select name="country"  style="width:300px;"  />                
				<option></option>
                <option>India</option>
                <option>England</option>
                <option>USA</option>
                <option>Srilanka</option>
                <option>Malasiya</option>
                <option>USR</option>
                </select>
        <br />
                <br />
                STATE:
                <select name="state"  style="width:300px;"  />                
				<option></option>
                <option>Karnataka</option>
                <option>Kerala</option>
                <option>Delhi</option>
                <option>Tamilnadu</option>
                <option>Goa</option>
                <option>Maharastra</option>
                </select>
                 <br />
          </div>
            
            <div class="content_half float_r checkout">
            	E-MAIL ID
				<input type="email" name="emailid"  style="width:300px;"  />
                <br />
                <br />
          PASSWORD<br />
				
                <input type="password"  name="newpassword" style="width:300px;"  />
                <br /><BR />
          CONFIRM PASSWORD<br />
				
                <input type="password" name="confirmpassword"  style="width:300px;"  />
                 <br /><BR />
          Gender:<br />
				
              <input type="radio"  name="gender" value="Male"  checked  />   Male<br />
              <input type="radio"  name="gender" value="Female"  />  Female
                 <br /><BR />
          CONTACT NO.<br />
				
                <input type="text"  style="width:300px;"  name="ContactNo" />
            </div>
            
            <div class="cleaner h50"></div>

			<p><input type="checkbox" name="termcondition" />
			I accept the terms of use of this website.</p>
            	<p> <input type="submit"  name="register" id="register" value="Register"   class="submit_btn" /></p>
                </form>
			</div>                 
            <?php
			}
			?>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
 <?php
include("footer.php");
?>