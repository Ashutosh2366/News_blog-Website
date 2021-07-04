<?php
if($_SESSION["role"]=='0')
{
  header("Location: http://localhost/News-blog/admin/post.php");
}
$user_id = $_GET['id'];

include 'config.php';
$sql = "DELETE FROM user WHERE user_id = {$user_id}";
if(mysqli_query($conn,$sql))
{
  header ("Location: http://localhost/News-blog/admin/users.php");
}
?>
