<?php 	
include('header.php');
if($_POST['add'])!="")
{
	$username=test_input($_POST['username']);
	$pass=md5($_POST['pass']);
	$conpass=md5($_POST['conpass']);
	if($pass==$conpass)
	{
		$query=mysqli_query($connection,"insert into staffs where admin_username='$username' and admin_password='$pass'");
			$_SESSION['alert']='Added Successfully';
			header('location:insert_staff_alert.php');
	}
	else
	{
			$_SESSION['alert']='Passwords Not Matching';
			header('location:insert_staff_alert.php');
	}
}
?>
<?php
if($_SESSION['login']==1)
{?>
<div class="container">
<center>
<img src="logo.png" height="75" width="75"/><br/>
<br/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5><br/>
<table class="table table-bordered">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr>
<th>Add New Staff</th>
</tr>
<tr>
<td><input type="text" placeholder="Username" name="username">
</tr>
<tr>
<td><input type="password" placeholder="Password" name="pass">
</tr>
<tr>
<td><input type="password" placeholder="Confirm Password" name="conpass">
</tr>
<tr>
<td><input type="submit" name="add" value="Add"/></td>
</tr>
</form>
</center>
<a href="dashboard.php">Go Home</a>
</div>
<?php
}
else
{
	session_destroy();
	header('location:admin_login.php');
}
?>