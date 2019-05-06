<?php

//DB Connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$mydb = "testbs";
	//Connection to database 
	$conn = new mysqli($servername, $username, $password, $mydb);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
else {
     $create_allitems =   "CREATE TABLE IF NOT EXISTS `allitems` (
 `item_id` int(10) NOT NULL AUTO_INCREMENT,
 `title` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
 `description` varchar(500) COLLATE utf8_unicode_520_ci NOT NULL,
 `price` float NOT NULL,
 `quantity` int(10) NOT NULL,
 `date_posted` date NOT NULL,
 `expiry_date` date NOT NULL,
 `user_id` int(10) DEFAULT NULL,
 PRIMARY KEY (`item_id`),
 KEY `user_id` (`user_id`),
 KEY `user_id_2` (`user_id`),
 CONSTRAINT `allitems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `allusers` (`id`)
)";
    
    if($conn->query($create_allitems))
    {
        echo "all items created";
    }
           
          $create_allusers =   "CREATE TABLE IF NOT EXISTS `allusers` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `name` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
 `email` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
 `password` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
 PRIMARY KEY (`id`)
)";
    
    if($conn->query($create_allusers))
    {
        echo "all users created";
    }
    
    
    $create_images = "CREATE TABLE IF NOT EXISTS `images` (
 `item_id` int(10) NOT NULL,
 `image_path` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
 KEY `item_id` (`item_id`),
 CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `allitems` (`item_id`)
)";
    
     if($conn->query($create_images))
    {
        echo "images created";
    }
    
    $create_solditems = "CREATE TABLE `solditems` (
 `item_id` int(10) NOT NULL,
 `sold_date` date NOT NULL,
 KEY `item_id` (`item_id`)
)";
    
     if($conn->query($create_solditems))
    {
        echo "sold items created";
    }
    

}
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
