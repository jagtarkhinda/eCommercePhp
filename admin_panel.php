      <?php
      require('header.php');
      require('dbconnection.php');

      if(isset($_SESSION["id"]))
         {
      ?>
      <!--

       List of Items posted by the user
       I will make a different page for listing all the itmes as those are needed at multiple places
      show the listing_items.php here
      -->
      <div class="container">
        <div>
              <h1 class="heading">Welcome to admin panel  <?php echo  $_SESSION["name"] ?></h1>
        </div>
          <table>
              <tr>
                  <td ><a class='btn btn-md btn-success btn-block' href="add_item.php">Add new Item</a></td>
              </tr>
          </table>
          <br>
      </div>
      <div class="container">
          <table class="table  table-hover">
            <thead class="thead-dark">
              <tr>
                  <!-- <th>Item Id</th> -->
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Date Posted</th>
                  <th>Expiry Date</th>
                  <th>Cover Image</th>
                  <th colspan="3" style="text-align:center;">Operations</th>
              </tr>
            </thead>

              <?php
          $select_items = "SELECT * FROM allitems WHERE user_id = '".$_SESSION['id']."'";
      		$result = $conn->query($select_items);

      		if ($result->num_rows > 0)
      		{


      			while($row = $result->fetch_assoc())
      			{
                       echo "<tr>";
                    //  echo  "<td>" .$row["item_id"] . "</td>";
                       echo  "<td>" .$row["title"] . "</td>";
                      echo  "<td>" .$row["description"] . "</td>";
                      echo  "<td>" .$row["price"] . "</td>";
                      echo  "<td>" .$row["quantity"] . "</td>";
                      echo  "<td>" .$row["date_posted"] . "</td>";
                      echo  "<td>" .$row["expiry_date"] . "</td>";

                       //selecting and displaying image from the images database corresponding to the item
                       $select_images = "SELECT * FROM images WHERE item_id = '".$row["item_id"]."' LIMIT 1";
                          $result_images = $conn->query($select_images);
                      if ($result_images->num_rows > 0) {
      			         while($row_image = $result_images->fetch_assoc())
      			         {

                       echo  "<td id='aaa'><img src='" .$row_image["image_path"] . "'/></td>";

                           }
                      }
                      else{
                         echo "<td>";
                          echo "</td>";
                      }
                      // end of image databse query
                      echo  "<td><a class='btn btn-sm btn-warning btn-block' href='modify_item.php?id=$row[item_id]&title=$row[title]&desp=$row[description]&price=$row[price]&quantity=$row[quantity]'>Modify</a></td>";
                       echo  "<td><a class='btn btn-sm btn-danger btn-block' href='remove_item.php?id=$row[item_id]'>Remove</a></td>";
                         echo  "<td><a class='btn btn-sm btn-warning btn-block' href='extend_expiry.php?id=$row[item_id]&date=$row[expiry_date]'>Extend Expiry</a></td>";
                      echo "</tr>";
                   }

              }
              else{
                 echo '<p class="else-parts"> No Items to Display. Click on Add Item to begin </p>';
              }


      ?>
          </table>

      </div>


      <?php
         }else{
          header("Location: login.php");
      }
      require('footer.php')
      ?>
