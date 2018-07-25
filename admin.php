<?php
include('header.php');
if($_POST['download']!="")
{
	$date=$_POST['date'];
	
	if($date!="")
	{
		$_SESSION['admin_date']=$date;
echo "<script type='text/javascript'>window.open('download.php', '_blank')</script>";		
	}
	else
	{
		$_SESSION['admin_alert']='All Fields are Required';
	}
}
?>
<?php
if($_SESSION['login']==1)
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
<th>Download Report</th>
</tr>
<tr>
<td><input type="date" name="date"></td>
</tr>
<tr>
<td colspan="3"><input  class="btn btn-default" type="submit" name="download" value="Download"/>
</tr>
</table>
</form>
<a href="dashboard.php">Go Home</a>
</center>
</div>
<?php
}
else{
	session_destroy();
	header('location:admin_login.php');
	
}