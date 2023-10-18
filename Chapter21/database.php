<?php
    function getDB(){
        $local_dsn = 'mysql:host=localhost;port=3306;dbname=my_guitar_shop1';
        $local_username = 'mgs_user';
        $local_password = 'pa55word';
        
        $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mnm23';
        $njit_username = 'mnm23';
        $njit_password = 'SQLdatabase1*';


        // For connecting to Local / Non Local database
        $dsn = $njit_dsn;
        $username = $njit_username;
        $password = $njit_password;

        try{
            $db=new PDO($dsn, $username, $password);
            echo '<p>connection established!</p>';
        }
        catch(PDOException $exception){
            $error_message = $exception->getMessage();
            include('databaseerror.php');
            exit();
        }
        return $db;
    }
?>  