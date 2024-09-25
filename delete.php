<?php
    include('config.php')
?>

<?php

$rid=$_GET['id'];

$sql="DELETE FROM students where id='$rid'";
$res=mysqli_query($conn,$sql);

if($res){
    header("Location: index.php");
}
else{
    echo"<script>alert('Fail to delete')</script>";
}
?>