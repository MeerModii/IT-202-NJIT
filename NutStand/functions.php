<?php
function add_nut_manager($email, $password, $firstName, $lastName) {
    global $database;

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO nutManagers (emailAddress, password, firstName, lastName)
              VALUES (:email, :password, :firstName, :lastName)';
    $statement = $database->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

function checkLoginCredentials($enteredEmail, $enteredPassword) {
    global $database;

    $query = 'SELECT * FROM nutManagers WHERE emailAddress = :email';
    $statement = $database->prepare($query);
    $statement->bindValue(':email', $enteredEmail);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and the entered password is valid
    if ($user && password_verify($enteredPassword, $user['password'])) {
        return true; // Valid credentials
    } else {
        return false; // Invalid credentials
    }
}
function getUserDetails($email) {
    global $database;

    $query = 'SELECT * FROM nutManagers WHERE emailAddress = :email';
    $statement = $database->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $userDetails = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $userDetails;
}

?>
