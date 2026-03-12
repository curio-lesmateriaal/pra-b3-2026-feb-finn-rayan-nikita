<?php
    $action = $_POST['action'];
    if ($action == "create"){
    
} else if ($action == "update"){
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $deadline = $_POST['deadline'] ?? '';

    if(isset($_POST['status']))
    {
        $prioriteit = 1;
    }
    else
    {
        $prioriteit = 0;
    }

    require_once '../../../backend/conn.php';

    $query = "UPDATE taken 
          SET titel = :titel, 
              beschrijving = :beschrijving,  
              afdeling = :afdeling, 
              deadline = :deadline, 
              status = :status 
          WHERE id = :id";;

    $statement = $conn->prepare($query);

   $statement->execute([
        ":id" => $id,
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":deadline" => $deadline,
        ":status" => $status
        ]);

     header("Location: ../../../task/done.php");
    }
    