<?php
require('header.php');
require('dbconnection.php');

if(isset($_SESSION["id"]) && !empty($_GET["id"]))
{
?>
<div class="container enter-data">
    <table class="">
        <form method="post" action="">
          <tr>
            <td>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
              </td>
          </tr>
            <tr>
                <td><label>Enter expiry date</label></td>
                <td> <input type="date" name="expiry" value="<?php echo $_GET['date'] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Extend</button>
              </td>
            </tr>
        </form>
    </table>
<?php
if(isset($_POST["submit"]))
{
  $id = $_POST["id"];
  $exp_date = $_POST["expiry"];
//  $modify_query = "UPDATE allitems SET expiry_date = '".$exp_date."' WHERE item_id = ".$id." AND DATEDIFF('".$exp_date."', date_posted) > 0 ";
  //$result = $conn->query($modify_query);
  mysqli_query($conn,"UPDATE allitems SET expiry_date = '".$exp_date."' WHERE item_id = ".$id." AND DATEDIFF('".$exp_date."', date_posted) > 0 ");
  //printf("Records affected: %d\n", mysqli_affected_rows($conn));
  if(mysqli_affected_rows($conn) > 0)
  {
   header ("Location: admin_panel.php");

  }
  else{
    echo "Please enter a date greater than posted date";
  }
}
 ?>
<?php
   }
   else{
    header("Location: login.php");
}
require('footer.php')
?>
