<?php


/*Mod Log
 *Date, User, Desc
 *2/11/22, Aiden, Create file and pasted Database Class from listeployees.php
 */

class Employee {
    
    private $first_name, $last_name;
    
    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }
    public function getLastName() {
        return $this->last_name;
    }
    
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT first_name, last_name FROM employee '
                . 'ORDER by last_name';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $employees = array();
        foreach ($rows as $row) {
            $employeeObject = new Employee($row['first_name'],
                    $row['last_name']);
            $employees[] = $employeeObject;
        }
        return $employees;
    }


    public static function getEmp() {
        $db = Database::getDB();
        $queryEmployee = 'SELECT * FROM employee';
        $statement1 = $db->prepare($queryEmployee);
        $statement1->execute();
        $employees = $statement1;
        return $employees;
}
}

?>