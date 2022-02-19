


<?php

/*Mod Log
 *Date, User, Desc
 *2/11/22, Aiden, Created. Use database strucure. Add visit methods.php
 */

    $nameC = filter_input(INPUT_POST, 'nameC');
    $emailC = filter_input(INPUT_POST, 'emailC', FILTER_VALIDATE_EMAIL);
    $phoneC = filter_input(INPUT_POST, 'phoneC');
    $commentC = filter_input(INPUT_POST, 'commentC');
    
    //validate inputs
    if ($nameC == NULL || $emailC == NULL || $phoneC ==NULL || $commentC == NULL) {
        $error = "Invalid input data, try again.";
        echo "Form data error: " . $error;
        exit();
    } else {
        //data is valid. define pdo & insert data
        try {
//          
              require_once ('./model/database.php');
              require_once ('./model/visit.php');
              

              addVisit($nameC, $emailC, $phoneC, $commentC);
                    
        } catch (PDOException $ex) {
            $error_message = $e->getMessage();
            echo 'DB Error: ' .$error_message;
        }
        
        //addDatabase
        //INSERT INTO visit
	//                          (first_name, email_address, phone_number, visit_msg, visit_date, employee_id)
        
    }
    //echo ($nameC);
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
        <a href="contact.html">Contact</a> -
        <a href="listemployees.php">Employee List</a> -
        <a href='admin.php'>Admin</a>
    </h1>

</nav>

<main>

    
    
    <h2>Thank You, <?php echo $nameC; ?> <br> We will get back to you shortly, <br> Content Sent: </h2>
    
    <label>Name:</label>
    <span><?php echo htmlspecialchars($nameC); ?></span><br>

    <label>Email Address:</label>
    <span><?php echo htmlspecialchars($emailC); ?></span><br>

    <label>Phone Number:</label>
    <span><?php echo htmlspecialchars($phoneC); ?></span><br>
    
    <label>Comments:</label><br>
    <span><?php echo $commentC; ?></span><br>
    
    

</main>

<footer>&#169 BoxTower 2021</footer>

</body>

</html>