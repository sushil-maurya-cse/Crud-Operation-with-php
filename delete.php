<?php
include 'conn.php';
 $id=$_GET['id'];
 $query="delete from crud_php where id=$id";
 $sql=mysqli_query($con,$query);
header('location:index.php');

?>