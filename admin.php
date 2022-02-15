<?php

//
//    $dsn = 'mysql:host=localhost;dbname=abdesignproject1';
//    $username = 'root';
//    $password = 'Pa$$w0rd';
//    




    try {
            require_once ('./model/database.php');
              require_once ('./model/visit.php');
              require_once ('./model/employee.php');
              $db = Database::getDB();
        } catch (PDOException $ex) {
            $error_message = $e->getMessage();
            
            echo 'DB Error: ' .$error_message;
            exit();
            }
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_visits';
        }
    }
    
    if ($action == 'list_visits') {
        $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
                if ($employee_id == NULL || $employee_id == FALSE) {
                    $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
                    if ($employee_id == NULL || $employee_id == FALSE) {
                    $employee_id = 1;   
                    }
                    }
            try {         
        $employees = EmployeeDB::getEmp();
        
        $queryVisit = 'SELECT visit_id, visit.first_name, visit.phone_number, visit.email_address, visit_msg, visit_date, visit.employee_id
                FROM visit
        JOIN employee
        ON visit.employee_id = employee.employee_id
        WHERE employee.employee_id = :employee_id
        ORDER BY visit_date';
            $statement2 = $db->prepare($queryVisit);
            $statement2->bindValue(':employee_id', $employee_id);
            $statement2->execute();
            $visits = $statement2;
            
            //$statement2->closeCursor();
                
    } catch (Exception $ex) {
        $error_message = $e->getMessage();
        echo 'DB Error ' . $error_message;
    }
    } else if ($action == 'delete_visit') {
        $visit_id = filter_input(INPUT_POST, 'visit_id', FILTER_VALIDATE_INT);
        $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
        $queryDelete = 'DELETE FROM visit WHERE visit_id = :visit_id';
        $statement3 = $db->prepare($queryDelete);
        $statement3->bindValue(':visit_id', $visit_id);
        $statement3->execute();
        $statement3->closeCursor();
        header("Location: admin.php?employee_id=$employee_id");
    }
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

    
    
    <h2>Admin</h2> <h4>Select an account to view 
        assigned Box information: </h4>
    <aside>
        <ul style="list-style: none;">
            <?php foreach ($employees as $employee) : ?>
            <li>
                <a href="?employee_id=<?php echo $employee['employee_id']; ?>"> 
                    <?php echo$employee['first_name'] . ' ' . $employee['last_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
            
        </ul>
    </aside>
        <hr> 
        
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th> 
                <th>Comments</th>
                <th>Date</th>
                
            </tr>
            <?php foreach ($visits as $visit) : ?>
            <tr>
                <td><?php echo $visit['first_name']; ?></td>
                <td><?php echo $visit['email_address']; ?></td>
                <td><?php echo $visit['phone_number']; ?></td>
                <td><?php echo $visit['visit_msg']; ?></td>
                <td><?php echo $visit['visit_date']; ?></td>
                <td>
                    <form action="admin.php" method="post">
                        <input type="hidden" name="employee_id" value="<?php echo $visit['employee_id']; ?>">
                        <input type="hidden" name="action" value="delete_visit"/>
                        <input type="hidden" name="visit_id" 
                               value="<?php echo $visit['visit_id']; ?>">
                        <input type="submit" value="Delete">
                        
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        
<!--        <label>Accounts</label>
        <input type="text"> <label>&nbsp;</label>
              <input type="button" id="search" value="Search">
        
        <hr>-->
        
<!--        <label>Username:</label>
    <span><?php ?></span><br>

    <label>User's Email Address:</label>
    <span><?php ?></span><br>

    <label>Box Description:</label>
    <span><?php ?></span><br>-->
    
    
    

</main>

<footer>&#169 BoxTower 2021</footer>

</body>

</html>