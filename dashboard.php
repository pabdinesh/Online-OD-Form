<?php
include('header.php');
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
<tr>
<th colspan="2">Welcome Admin!</th>
</tr>
<tr>
<td>
<a href="new.php"><button class="btn btn-default">Add New OD </button></a>
</td>
<td>
<a href="admin.php"><button class="btn btn-default">Download Report</button></a>
</td>
</tr>
<tr>
<td>
<a href="change_password.php"><button class="btn btn-default">Change Password</button></a>
</td>
<td>
<a href="manual_od.php"><button class="btn btn-default">Manual OD</button></a>
</td>
</tr>
<tr>
<td colspan="2">
<a href="insert_staff.php"><button class="btn btn-default">Add Staff</button></a>
</tr>
<tr>
<td colspan="2"><a href="logout.php">Logout</a>
</tr>
</center>
</div>
<?php
}
else
{
	session_destroy();
	header('location:admin_login.php');
}
?>