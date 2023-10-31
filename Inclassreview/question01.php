<?php

    require_once('nutsdatabases.php');
    function add_employee($employeeName, $jobTitle, $salary){
        require_once('nutsdatabases.php');
        $query = "INSERT INTO employees ('employeeName','jobTitle','salary','hiredate) 
        VALUES
        (:employeeName, :jobTitle, :salary, NOW())";
        bind

    }
?>