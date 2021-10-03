### This code is used for admin which was built for uploading book name , author name , tittle , image and store in database.Whole code is written in php.Moreover, manupulation of data can be done

#### This data is use by ecommerce website which was build and can be found in repositories


*sql to create database*

##### ======================================= 
##### create a bs database then run sql query 
##### ======================================= 

***Create Book table***

>CREATE TABLE book ( book_id VARCHAR(100) PRIMARY KEY , title VARCHAR(50) NOT NULL, author VARCHAR(50) NOT NULL, price VARCHAR(30) NOT NULL, image VARCHAR(100), category VARCHAR(50), description VARCHAR(10000) NOT NULL )

**CREATE TABLE book_details_more( book_id VARCHAR(100) PRIMARY KEY,author VARCHAR(50) NOT NULL, first_co_author VARCHAR(500),publisher VARCHAR(500),stock int(255))**

***Create user-delivery  section where admin will see how many have ordered***

>CREATE TABLE user_deliver ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, full_name VARCHAR(30) NOT NULL, book_name VARCHAR(500) NOT NULL, street1 VARCHAR(30) NOT NULL, street2 VARCHAR(50), city VARCHAR(50), zip VARCHAR(50), toal_cost_pass VARCHAR(50), stripeToken VARCHAR(50), stripeEmail VARCHAR(50), hash_token_for_client_for_ship VARCHAR(50), time TIMESTAMP DEFAULT CURRENT_TIMESTAMP )

##### =============================================
##### create a players database then run sql query 
##### =============================================
***Create admin section***

>CREATE TABLE mail_change( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,user_id VARCHAR(100),new_email VARCHAR(50) NOT NULL, token VARCHAR(500))


>CREATE TABLE admin ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, user VARCHAR(30) NOT NULL, password VARCHAR(100) NOT NULL )

>Then add admin user and password as per client demand manually


>The username and password is admin & admin respectively (Hashed in md5 )


>INSERT INTO admin (user,password) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');

**Set the email address for localserver**

### Before singup signup some checking valid email or not with verified Token

**Create a Database first_database_for_check**

>Run this sql query

>CREATE TABLE check_after_signup ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(100) NOT NULL, hash VARCHAR(50), type VARCHAR(50), Nickname VARCHAR(50), time TIMESTAMP DEFAULT CURRENT_TIMESTAMP )

***Then u ready to go***

## For Password reset

##### User forgot password  --> reset the password

***sql to create password_reset databse***
> CREATE TABLE password_reset_temp ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,email VARCHAR(30) NOT NULL, expDate VARCHAR(30) NOT NULL)

***sql to create database first create a players database then run sql query***
> CREATE TABLE users ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(100) NOT NULL, nickname VARCHAR(50), password_hash VARCHAR(100), bio VARCHAR(50) ) 

***Run the .bat file in schedule task in every 5 minute so the token get expired***



## Ecommerce website Main page


***This is a ecommerce website repo***

***This is a web app for shopping online (Book store)***


Create a database first



***sql to create database first create a password_reset database then run sql query***
> CREATE TABLE password_reset_temp ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(30) NOT NULL, expDate VARCHAR(30) NOT NULL ) 


***Also user your stripe api-key and add it in config.php file***

$publishablekey = "<here your public api>";
  
$secretkey = "<here your secretkey>";
  
 And also change the receiver email from ***

"contact_without_login_index.php"
  
$to_email = 'receiver-email@gmail.com';

"mail_sent.php" 
  
  
$to_email = 'sender-email@gmail.com';
  
  
## Picture of Interface :
  
  ***For Admin Interface:***
  
  >login Panel
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/1_admin_panel.png" width="550" height="300">  
  
   >Admin Insert Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/2_insert.png" width="80%" height="80%">
  
  
   >Admin Delete Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/3_delete.png" width="80%" height="80%">
  
  
  
   >Admin Edit Details
  
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/4_edit_update.png" width="80%" height="80%">
  
  
    
  >Admin Order Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/6_order_details.png" width="80%" height="80%">
  
 
  
  
  ***For User Interace :***
  
  
  >Register ACC
  
  <img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/1_registration.png" width="100%" height="80%">
  
    
  
  >Register Confirm
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/2_register_email.png" width="70%" height="70%">
  
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/3_login.png" width="50%" height="50%">
  
   
  >Interface
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/4_suerINterface.png" width="70%" height="90%">
  
      
  
  >Reviews Interface
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/5_reviews_of_book.png" width="85%" height="90%">
  
      
  
  >Reviews Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/6_details_of_books.png" width="85%" height="90%">
  
  
  
  >Reviews Books
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/4_see_reviews.png" width="85%" height="90%">
  
 >One reviews
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/5_reviews%20details.png" width="85%" height="90%">
  
 
  >User Panel
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/7_user_panel.png" width="85%" height="90%">
  
 
  >Reviews Cart
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/8%20user%20cart.png" width="85%" height="90%">
  
  
  >Information Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/9%20user%20information.png" width="85%" height="90%">
  
  
  >Card Info
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/10%20user%20card%20info.png" width="30%" height="90%">
  
  
  >Admin Password Reset
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/11%20password%20reset%20first.png" width="50%" height="40%">
  
  
 >Admin Reset pass Email
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/19_admin_reset_pass_mail.png" width="50%" height="40%">
  
 >Admin Reset pass Final
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/19_admin_reset_pass.png" width="50%" height="40%">
  
  
  >Eamil confirm 
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/asfasdfadf.png" width="70%" height="90%">
  
  
  >Full Reviews
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/out%20of%20stock.png" width="85%" height="90%">
  
  
  >Reviews User Details
  
<img src="https://github.com/Roshankc682/Book_Store/blob/master/Image/user_details.png" width="100%" height="90%">
  
  
