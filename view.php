<?php
include('header.php');
if($_POST['download']!="")
{
	$date=$_POST['date'];
	
	if($date!="")
	{
		$_SESSION['staff_date']=$date;
echo "<script type='text/javascript'>window.open('view1.php', '_blank')</script>";		
	}
	else
	{
		$_SESSION['_alert']='All Fields are Required';
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
<br/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5><br/>
<table class="table table-bordered">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr>
<th>View Report</th>
</tr>
<tr>
<td><input type="date" name="date"></td>
</tr>
<tr>
<td colspan="3"><input  class="btn btn-default" type="submit" name="download" value="View"/>
</tr>
</table>
</form>
<a href="staff_dashboard.php">Go Home</a>
</center>
</div>
<?php
}
else{
	session_destroy();
	header('location:staff.php');
	
}