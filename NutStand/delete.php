<?php 
    require_once('nutsdatabase.php');
    if (isset($_POST['nutId'])) {
        // Get nutId from the POST data
        $nutId = $_POST['nutId'];
    
        // Prepare and execute the DELETE query
        $query = 'DELETE FROM nuts WHERE nutCode = :nutId';
        $statement = $database->prepare($query);
        $statement->bindValue(':nutId', $nutId);
        $statement->execute();
        $statement->closeCursor();

        include_once('nutinfo.php');
    }
?>