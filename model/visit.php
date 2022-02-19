<?php


/*Mod Log
 *Date, User, Desc
 *2/11/22, Aiden, Create file and validations. 
 *2/15/22, Aiden, Removed last name as it wasn't needed and caused conflict
 */

function addVisit($nameC, $emailC, $phoneC, $commentC) {
    
    $db = Database::getDB();
    
    $query = 'INSERT INTO visit (first_name, email_address, phone_number, visit_msg, visit_date, employee_id) 
                VALUES (:nameC, :emailC, :phoneC, :commentC, NOW(), 1)';
        $statement = $db->prepare($query);
        $statement->bindValue(':nameC', $nameC);
        $statement->bindValue(':emailC', $emailC);
        $statement->bindValue(':phoneC', $phoneC);
        $statement->bindValue(':commentC', $commentC);
        
        $statement->execute();
        $statement->closeCursor();
}
        
?>