<?php
include('header.php');
if($_POST['submit']!="")
{
	$count=0;
	$username=test_input($_POST['username']);
	$new_password=test_input($_POST['new_password']);
	$con_password=test_input($_POST['con_password']);
	if($new_password==$con_password)
	{
		$query=mysqli_query($connection,"update users set admin_password=(md5('$new_password'))where admin_username='$username'");
		header('location:index.php');
	}
	else
	{
			$err='<div class="alert alert-danger">
New Passwords Not Matching!
</div>';
	}
}
?>
<?php
if($_SESSION['login']==1)
{?>
<?php
if($err!="")
{
	echo $err;
}
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
<th>Change Password!</th>
</tr>
<tr>
<td><input type="username" class="form-control" placeholder="Username" name="username"/></td>
</tr>
<tr>
<td><input type="password" class="form-control" placeholder="New Password" name="new_password"/></td>
</tr>
<tr>
<td><input type="password" class="form-control" placeholder="Confirm Password" name="con_password"/></td>
</tr>
<tr>
<td><input type="submit" value="Change Password" name="submit"/>
</tr>
</center>
<?php
}
else
{
	session_destroy();
	header('location:admin_login.php');
}
?>