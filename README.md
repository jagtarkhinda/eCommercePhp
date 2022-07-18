# eCommecre Website
### A basic eCommerce website made using PHP, MySQL and Bootstrap.

#### Below is the detailed summary of the things I performed using the code.

Develop a website that people can buy/sell products.

- [x] Viewers of the website are able to register.
- [x] A registered user is able to post items for sale on the website.
- [x] Every item has the Price, at least one at most 4 images, quantity.
- [x] Once posted on the website, the item will remain visible on the website for two weeks from the day it was posted and then it disappears.
- [x] Items that have quantity equal to zero, are not displayed.
- [x] Non-register users are ONLY able to view the items, but cannot purchase or post anything.
- [x] When the website pops-up, the last 10 sold products have to be displayed on the screen.
- [x] A viewer is able to see a complete list of products by clicking "View Items".
- [x] Any user is able to click on an item to see the details for that item, e.g. name of owner, contact of owner, etc.
- [x] When a registered user views a product, the "Purchase" button shows up.
- [x] On clicking purchase the user is directed to a page where the specifications of user is taken and the transaction is completed.

##### Once a registered user logs-in, the following options show up for that user:
- [x] List of posted items by that user
- [x] Add item: The user can add item to the website.
- [x] Modify item: The user can modify the specifications of an item, e.g. price, quantity, name, etc.
- [x] Extend: To extend the expiry date (visibility) for the item.
- [x] Remove item: The user can remove one or more items that he has posted.

 - **Note: You cannot actually purchase the item. There is not functionality for performing the actual transactions.**
 
 #### How to use it 
 
- All you need is an xampp server installed and make sure to turn on Apache and MySQL.
- Then make a database in phpMyAdmin if you want to start fresh, otherwise import the included database. (current databse name is 'testbs', you can always change it from dbconnection.php)
