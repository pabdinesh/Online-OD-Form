<?php
include('header.php');
$alert=$_SESSION['alert'];

if($_POST['ok'])
{
	header('location:insert_staff.php');
}
?>
<?php
if($alert!="")
{
	?>
	<center>
	<div class="container">
	<table class="table table-bordered">
	<tr>
	<th>Notification</th>
	</tr>
	<tr>
	<td><?php echo $alert;?></td>
	</tr>
	<tr>
	<td>
	<form method="post" action="">
	<input  class="btn btn-default" 	type="submit" name="ok" value="OK"/>
	</form>
	</td>
	</tr>
	</table>
	</center>
	</div>
	<?php
}
else
{

	header('location:insert_staff.php');
}