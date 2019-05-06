    <?php
    require('header.php');
    require('dbconnection.php');
    ?>
    <div id="signlog">
    <form class="form-signin" method="post" action="login.php">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Log in</button>


            <?php

        if(isset($_POST["submit"]))
        {
        if(isset($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["email"]))
        {
            $uemail = $_POST["email"];
            $upass = $_POST["pass"];
            $uemail = strtolower($uemail);
            $sql = "SELECT * FROM allusers WHERE email = '".$uemail."'  AND password = '".$upass."' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
        while($row = $result->fetch_assoc())
        {
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["emil"] = $row["email"];
        }

                 header('Location: index.php');
            }
            else{
                 echo " Wrong User Data. Please try again";
            }
        }
        else{
            echo "Please fill all the fields";
        }
        }
        ?>
    </form>
    </div>
    <?php
    require('footer.php');
    ?>
