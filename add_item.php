<?php
require('header.php');
require('dbconnection.php');

if(isset($_SESSION["id"]) && !empty($_SESSION["id"]))
{
    ?>
<div class="container enter-data">
    <table>
        <form method="post" action="add_item.php" enctype="multipart/form-data">
            <tr>
                <td><label>Title of the item </label></td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td><label>Description </label></td>
                <td><input type="text" name="desp"></td>
            </tr>
            <tr>
                <td><label>Price </label></td>
                <td><input type="number" min="0" maxlength="5" name="price"></td>
            </tr>
            <tr>
                <td><label>Quantity </label></td>
                <td> <input type="number" min="0" name="quantity"></td>
            </tr>
            <tr>
                <td> <label>Select Image (max 4) </label></td>
                <td><input type="file" name="images[]" multiple></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Add Item</button> </td>

            </tr>
            <!--   auto <label>Date posted</label>-->

            <!--   auto <label> Expity date</label>-->
        </form>
    </table>

    <?php
    if(isset($_POST["submit"]))
    {
      //  $aa = $_POST['images'];
       // echo $aa;
        //Storing data in Database
        if(!empty($_POST["title"]) && !empty($_POST["desp"]) && !empty($_POST["price"]) && !empty($_POST["quantity"])
          && (!empty(array_filter($_FILES['images']['name']))))
        {
            $title = $_POST["title"];
            $description =$_POST["desp"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];

            //Using Now and now + interval functions to insert the dates in database
            $insert_item = "INSERT INTO allitems(`title`, `description`, `price`, `quantity`, `date_posted`, `expiry_date`, `user_id`)
             VALUES ('".$title."','".$description."','".$price."','".$quantity."',NOW(),NOW() + INTERVAL 14 DAY,'".$_SESSION['id']."')";

            if($conn->query($insert_item))
            {
              echo   "<p class='else-parts'>
              Item Successfully Uploaded
              </p>";
                $item_id = $conn->insert_id;
            }

        //array to store all image paths
          $image_paths_array = [];
        //Storing Images in a folder
        if(!empty(array_filter($_FILES['images']['name']))){
              $errors= array();
            //looping trhough the images array. As we do not want more than 4 images. we will use the counter
            $counter = 0;
             foreach($_FILES['images']['name'] as $key=>$val)
             {
                if($counter<4){
                $file_name = basename($_FILES['images']['name'][$key]);
                $file_tmp =($_FILES['images']['tmp_name'][$key]);

                $image_paths_array[$counter] = $image_path = "images/". $file_name;
                if(empty($errors)==true)
                {
                    move_uploaded_file($file_tmp,$image_path);
                }
                else{
                    print_r($errors);
                }
                }
                 $counter++;
             }
            }
            //Sotring the location of all images selected by user in the database
            for($x=0;$x<count($image_paths_array);$x++)
            {
                $insert_image = "INSERT INTO images(`item_id`, `image_path`)
                VALUES ('".$item_id."','".$image_paths_array[$x]."')";

                if($conn->query($insert_image))
                {


                }
            }
        }
        else {
            echo "All the fields are required";
        }
    }

    ?>
</div>
<?php

}
?>
<?php
require('footer.php');
?>
