<?php
    
?>  


<!DOCTYPE html>
<html lang="en">

<!----------------------------------------------------------------------------------------------------------------
--
#Original Author: Aiden B                                       #
#Date Created: 8/25/21                                         #
#Version: 1.5                                                 #
#Date Last Modified: 9/17/21                               #
#Modified by: Aiden                                          #
#Modification log:                                        #
  
9/8/21- reworked layouts and transferred content to other pages for cleaner design, contact and updatelist pages*
9/9/21- like updatelist, created contact page for better usability and tied it to the contact.js
9/10/21 further edited code to be cleaner. Removed commented out code no longer used. connected java link properly.
9/13/21- re-inserted mod logs left behind from transfer, oops
9/17/21- Added favicon. added phone input. adjusted spacing of elements for mobile friendly use
 --
------------------------------------------------------------------------------------------------------------------>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Box Tower home page">
    <meta name="keywords" content="digital, box, tower, boxtower, code, software, webdesign">
    <meta name="author" content="Aiden Buxton">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">

    <script src="js/javaScriptContact.js"></script>

    <title>BOX TOWER</title>
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.ico"/>

</head>

<body>

<header>
    <div class="themeDefault" id="sideNav"></div>
    <img id="logo" src="img/logo.png" alt="Box Tower logo.">
</header>

<nav>

    <h1>
        <a href="home.html">Home</a> -
        <a href="updateList.html">Update-List</a> -
        <a href="contact.html">Contact</a>
    </h1>

</nav>

<main>

    
    
    <h2>Admin</h2> <h4>Select an account to view 
        assigned Box information: </h4>
        <hr> 
        <label>Accounts</label>
        <input type="text"> <label>&nbsp;</label>
              <input type="button" id="search" value="Search">
        
        <hr>
        
        <label>Username:</label>
    <span><?php ?></span><br>

    <label>User's Email Address:</label>
    <span><?php ?></span><br>

    <label>Box Description:</label>
    <span><?php ?></span><br>
    
    
    

</main>

<footer>&#169 BoxTower 2021</footer>

</body>

</html>