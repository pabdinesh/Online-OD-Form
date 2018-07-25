<?php
include('header.php');
?>
<?php
if($_SESSION['staff']==1)
{?>
<div class="container">
<center>
<img src="logo.png" height="75" width="75"/><br/>
<br/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5><br/>
<table class="table table-bordered">
<tr>
<th colspan="2">Welcome Staff!</th>
</tr>
<tr>
<td>
<a href="staff_new.php"><button class="btn btn-default">Add New OD </button></a>
</td>
<td>
<a href="view.php"><button class="btn btn-default">View Report</button></a>
</td>
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
	header('location:staff.php');
}
?>