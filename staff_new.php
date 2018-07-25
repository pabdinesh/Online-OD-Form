<?php
include('header.php');
if($_POST['apply']!="")
{
	$od_name=strtoupper(test_input($_POST['od_name']));
	$od_rollno=strtoupper(test_input($_POST['od_rollno']));
	$od_year=test_input($_POST['od_year']);
	$od_section=strtoupper(test_input($_POST['od_section']));
	$od_type=test_input($_POST['od_type']);
	$od_location=strtoupper(test_input($_POST['od_location']));
	$od_date=$_POST['od_date'];
	$od_month= date("m",strtotime($od_date));
	if($od_name!="" && $od_rollno!="" && $od_date!="" && od_year!="" &&od_section!="" && od_type!="" && od_location!="")
	{
		$query=mysqli_query($connection,"select * from od_table where od_name='$od_name' and od_rollno='$od_rollno' and month(od_date)='$od_month'");
		$count=mysqli_num_rows($query);
		$query2=mysqli_query($connection,"select * from od_table where od_date='$od_date' and od_year='$od_year' and od_section='$od_section'");
		$count2=mysqli_num_rows($query2);
		if($count==0 && $count2<5)
		{
			$query1=mysqli_query($connection,"insert into od_table(od_name,od_rollno,od_date,od_year,od_section,od_type,od_location)values ('$od_name','$od_rollno','$od_date','$od_year','$od_section','$od_type','$od_location')");
			$_SESSION['alert']='OD Availed Successfully';
			header('location:staff_alert.php');
		}
		else if($count!=0)
		{
			$_SESSION['alert']='Your Monthly Quota Exhausted';
			header('location:staff_alert.php');
		}
		else{
			$_SESSION['alert']='Maximum No.of.OD in class Reached';
			header('location:staff_alert.php');
		}
}
else
{
	$_SESSION['alert']='All Fields are Required';
	header('location:staff_alert.php');
}
}
?>
<?php
if($_SESSION['staff']==1)
{
	?>
<div class="container">
<center>
<img src="logo.png" height="75" width="75"/><br/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5><br/>
<table class="table table-bordered">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr>
<th colspan="2">New OD Application</th>
</tr>
<tr>
<td colspan="2"><input type="text" class="form-control" placeholder="Student Name" name="od_name" ></td>
</tr>
<tr>
<td colspan="2"><input type="text" class="form-control" placeholder="Roll No" name="od_rollno"></td>
</tr>
<tr>
<td colspan=2>
<input type="date" class="form-control" name="od_date">
</td>
</tr>
<tr>
<td><select name="od_year" class="form-control">
<option value=""selected disabled>Year</option>
<option value="2">II</option>
<option value="3">III</option>
<option value="4">IV</option>
</select>
</td>
<td>
<select name="od_section" class="form-control">
<option value=""selected disabled>Section</option>
<option value="c">C</option>
<option value="d">D</option>
<option value="e">E</option>
<option value="f">F</option>
</select>
</td>
</tr>
<tr>
<td colspan="2"><input type="text" class="form-control"placeholder="Event Location" name="od_location"/></td>
</tr>
<tr>
<td colspan="2"><select name="od_type" class="form-control">
<option value=""selected disabled>Event Type</option>
<option value="Symposium">Symposium</option>
<option value="Paper Presentation">Paper Presentation</option>
<option value="Workshop">Workshop</option>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" class="btn btn-default" name="apply" value="Apply"></td>
</tr>
</form>
</table>
<a href="staff_dashboard.php">Go Home</a>
</center>
</div>
<?php
}
else
{
	session_destroy();
	header('location:staff.php');
}
?>