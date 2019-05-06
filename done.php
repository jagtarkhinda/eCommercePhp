<?php
require('header.php');
require('dbconnection.php');

if(isset($_POST["quan_left"]))
{

  mysqli_query($conn,"UPDATE allitems SET quantity = '".$_POST['quan_left']."' WHERE item_id = ".$_POST['id_send']."");
  mysqli_query($conn,"INSERT INTO solditems VALUES('".$_POST['id_send']."', NOW() )");
  //printf("Records affected: %d\n", mysqli_affected_rows($conn));
  if(mysqli_affected_rows($conn) > 0)
  {
    $comp_message = "Purchase complete";
   header ("Location: view_items.php?comp=$comp_message");
  }
  else{
    echo "Query not correct";
  }
}else {
    echo "Purchase not completed";
}
require('footer.php')
?>
