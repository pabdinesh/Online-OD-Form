<?php
include('header.php');
$od_date=$_SESSION['staff_date'];
?>
<?php
if($_SESSION['staff_date']!="")
{
	?>
<center>
<div class="container">
<img src="logo.png" height="60" width="60"/>
<h4>Panimalar Engineering College</h4>
<h5>Department of CSE</h5>

<table class="table table-bordered">
<tr>
<th colspan="5">Student On Duty List ( <?php echo date("d",strtotime($od_date)); echo "-"; echo date("m",strtotime($od_date)); ; echo "-"; echo date("Y",strtotime($od_date)); ;?> )</th>
</tr>
<tr>
<th colspan="5">II</th>
</tr>

<?php 
$query=mysqli_query($connection,"select * from od_table where od_year=2 and od_date='$od_date'");
while($fetch=mysqli_fetch_assoc($query))
{
?>
<tr>
<td><?php echo $fetch['od_rollno'];?></td>
<td><?php echo $fetch['od_name'];?></td>
<td><?php echo $fetch['od_section'];?></td>
<td><?php echo $fetch['od_type'];?></td>
<td><?php echo $fetch['od_location'];?></td>
</tr>
<?php }  ?>
<tr>
<th colspan="5">III</th>
</tr>
<?php 
$query=mysqli_query($connection,"select * from od_table where od_year=3 and od_date='$od_date'");
while($fetch=mysqli_fetch_assoc($query))
{
?>
<tr>
<td><?php echo $fetch['od_rollno'];?></td>
<td><?php echo $fetch['od_name'];?></td>
<td><?php echo $fetch['od_section'];?></td>
<td><?php echo $fetch['od_type'];?></td>
<td><?php echo $fetch['od_location'];?></td>
</tr>
<?php } ?>
<tr>
<th colspan="5">IV</th>
</tr>

<?php 
$query=mysqli_query($connection,"select * from od_table where od_year=4 and od_date='$od_date'");
while($fetch=mysqli_fetch_assoc($query))
{
?>
<tr>
<td><?php echo $fetch['od_rollno'];?></td>
<td><?php echo $fetch['od_name'];?></td>
<td><?php echo $fetch['od_section'];?></td>
<td><?php echo $fetch['od_type'];?></td>
<td><?php echo $fetch['od_location'];?></td>
</tr>
<?php } ?>
</table>
</center>
</div>
<?php
}
else
{
	header('location:staff.php');
}
?>	