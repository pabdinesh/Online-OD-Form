<?php
include('header.php');
$_SESSION['login']=0;
if($_POST['login']!="")
{
	$admin_username=test_input($_POST['admin_username']);
	$admin_password=md5(test_input($_POST['admin_password']));
	if($admin_username!="" && $admin_password!="")
	{
		$query=mysqli_query($connection,"select * from staffs where admin_username='$admin_username' and admin_password='$admin_password'");
		$count=mysqli_num_rows($query);
		if($count==1)
		{
			$_SESSION['staff']=1;
			header('location:staff_dashboard.php');
		}
		else
		{
			$err='<div class="alert alert-danger">
Invalid Login Credinals!
</div>';
		}
	}
}
?>
<?php
if($err!="")
{
	echo $err;
}
	?>
<div class="container">
<img src="logo.png" height="75" width="75"/><br/>
<br/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5><br/>
<table class="table table-bordered">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr>
<th>Staff Login</th>
</tr>
<tr>
<td><input type="text"  class="form-control"placeholder="Username" name="admin_username"/>
</tr>
<tr>
<td><input type="password" class="form-control" placeholder="Password" name="admin_password"/>
</tr>
<tr>
<td><input type="submit" class="btn btn-deafult" value="Login" name="login"/>
</tr>
</form>
</table>
</div>
