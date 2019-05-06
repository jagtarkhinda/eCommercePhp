<?php
require('header.php');
require('dbconnection.php');

if(isset($_SESSION["id"]) && !empty($_GET["id"]))
{
     //getting id from previous page to use it with the where clause in sql query

  $id = $_GET["id"];
  //To remove the recored first we need to remove the images from the images table because it is tied with foreign key
  $remove_images = "DELETE FROM images WHERE item_id = ".$id." ";
  $result = $conn->query($remove_images);
  if($result > 0)
  {
    $remove_query = "DELETE FROM allitems WHERE item_id = ".$id." ";
    $result2 = $conn->query($remove_query);
    if($result2 > 0)
    {
      header ("Location: admin_panel.php");
    }
    else{
      echo " Item Not Removed";
    }
}
}
   else{
    header("Location: login.php");
}
require('footer.php')
?>
