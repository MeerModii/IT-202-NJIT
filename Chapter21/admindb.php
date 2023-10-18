<?php 
    include('database.php');
    function is_valid_login($email, $password){
        $db = getDB();
        $query = 'SELECT password FROM administrators WHERE emailAddress = :email';
        $statememt = $db->prepare($query);
        $statememt->bindValue(':email', $email);
        $statememt->execute();
        $row = $statememt->fetch();
        $statememt->closeCursor();

        if($row === false){
            return false;
        }
        else{
            $hash = $row['password'];
            return password_verify($password, $hash);

        }
    }
?>