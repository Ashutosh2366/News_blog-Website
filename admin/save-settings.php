<?php
include "config.php";


if(empty($_FILES['logo']['name'])){
   $file_name = $_POST['old_logo'];
}else{
  $errors = array();

  $file_name = $_FILES['logo']['name'];
  $file_size = $_FILES['logo']['size'];
  $file_tmp = $_FILES['logo']['tmp_name'];
  $file_type = $_FILES['logo']['type'];
  $ext=explode('.',$file_name);
  $file_ext = strtolower(end($ext));
  $extensions = array("jpeg","jpg","png");

  if(in_array($file_ext,$extensions)==false)
  {
    $errors[]="This extension file is not allowed, please chose a JPG or PNG";
  }
  if($file_size > 2097152)
  {
    $errors[]="file size must be 2 MB or lower.";
  }
  if(empty($errors)==true)
  {
    move_uploaded_file($file_tmp,"images/".$file_name);
  }else{
    print_r($errors);
    die();
  }
}
$sql = "UPDATE settings SET websitename='{$_POST["website_name"]}',logo='{$file_name}',footerdesc='{$_POST["footer_desc"]}'";

      $result=mysqli_query($conn,$sql);
      if($result)
      {
        header("Location: http://localhost/News-blog/admin/settings.php");
      }else{
        echo "Query Failed";
      }
 ?>
