<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if ($action == "create")
    session_start();

$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action == 'create') {

    $created_at = date('Y-m-d H:i:s');

    // Variabelen uit form
    $titel = $_POST['attractie'] ?? '';
    $afdeling = $_POST['group'] ?? '';
    $status = isset($_POST['prioriteit']) ? 1 : 0;
    $beschrijving = $_POST['info'] ?? '';
    $deadline_input = $_POST['datetime'] ?? '';

    // 👇 user als INT uit session
    $user = $_SESSION['user_id'] ?? null;

    // datetime-local → DATE
    $deadline = null;
    if (!empty($deadline_input)) {
        $deadline = date('Y-m-d', strtotime($deadline_input));
    }

    // Validatie
    if (empty($titel)) {
        $errors[] = "Vul een titel in.";
    }

    if (empty($afdeling)) {
        $errors[] = "Kies een afdeling.";
    }

    if (empty($beschrijving)) {
        $errors[] = "Voer een beschrijving in.";
    }

    if (empty($deadline)) {
        $errors[] = "Vul een deadline in.";
    }

    if (empty($user)) {
        $errors[] = "Geen gebruiker ingelogd.";
    }

    if (isset($errors)) {
        var_dump($errors);
        die();
    }

    // DB connectie
    require_once '../../../backend/conn.php';

    // Query (let op: tabelnaam = taken)
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline, user, created_at)
              VALUES (:titel, :beschrijving, :afdeling, :status, :deadline, :user, :created_at)";

    $statement = $conn->prepare($query);

    $statement->execute([
        ':titel' => $titel,
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
        ':status' => $status,
        ':deadline' => $deadline,
        ':user' => $user,
        ':created_at' => $created_at
    ]);

    header("Location: ../../../index.php");
    exit;
} else if ($action == "update") {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $deadline = $_POST['deadline'] ?? '';

    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
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
} else if ($action == 'delete') {

    $id = $_GET['id'];

    require_once '../../../backend/conn.php';
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    header("Location: ../../../task/done.php");
}
