<?php
require('header.php');
require('dbconnection.php');
?>
<div id="signlog">
<form class="form-signin" method="post" action="signup.php">
    <h1 class="h3 mb-3 font-weight-normal">Sign Up form</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
    <br>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="repass" class="form-control" placeholder="Password again" required>
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign Up</button>


    <?php
if(isset($_POST["submit"]))
{
if(!empty($_POST["email"]) && !empty($_POST["pass"]) &&  $_POST["pass"] == $_POST["repass"] )
{
    $uname = $_POST["name"];
    $uemail = $_POST["email"];
    $upass = $_POST["pass"];
    $uname = strtolower($uname);
    $uemail = strtolower($uemail);
    $sql = "SELECT * FROM allusers WHERE name = '".$uname."'  AND email = '".$uemail."' ";
    
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        /*while($row = $result->fetch_assoc()) 
			{*/
        //echo $sql;
        echo  "User with same email already exists!";
    }
    else{
         $adduser = "INSERT INTO allusers(`id`, `name`, `email`, `password`) VALUES ('','".$uname."','".$uemail."','".$upass."')";
       // echo $adduser;
         $conn->query($adduser);
        echo "Registration Sucessfull";
    }
}
else{
    echo "Please check thet input and try again";
}
}
?>
</form>
</div>
<?php
require('footer.php');
?>
