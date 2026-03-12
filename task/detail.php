<!doctype html>
<html lang="nl">

<head>

</head>

<body>
    <?php

    if (!isset($_GET['id'])) {
        echo "Geef in je aanpaslink op de index.php het id van betreffende item mee achter de URL in je a-element om deze pagina werkend te krijgen na invoer van je vijfstappenplan";
        exit;
    }
    ?>


    <h1>Taak aanpassen</h1>

    <?php
    //Haal het id uit de URL:
    $id = $_GET['id'];

    //1. Haal de verbinding erbij
    require_once '../backend/conn.php';

    //2. Query
    $query = "SELECT * FROM taken WHERE id = :id";

    //3. Van query naar statement
    $statement = $conn->prepare($query);

    //4. Voer de query uit
    $statement->execute([
        ":id" => $id
    ]);

    //5. Haal de melding op
    $taken = $statement->fetch(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($taken);
    echo "</pre>";
    ?>
    <main>

        <form action="../app/Http/Controllers/takencontroller.php" method="POST">

            <div class="form-group">
                <label>Titel:</label>
                <input type="text" id="titel" name="titel" value="<?php echo $taken['titel']; ?>">
            </div>
            <div class="form-group">
                <label>Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving"><?php echo $taken['beschrijving'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <select name="afdeling" id="afdeling">
                    <option value="">-- Kies een afdeling --</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finance">Finance</option>
                    <option value="Klantenservice">Klantenservice</option>
                    <option value="Facilitair">Facilitair</option>
                    <option value="Onderhoud">Onderhoud</option>
                    <option value="Management">Management</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>

                <input type="checkbox" name="status" id="status"
                    <?php if ($taken['status'] == 1) echo "checked"; ?>>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-input"
                    value="<?php echo $taken['deadline']; ?>">
            </div>
            <input type="hidden" name="action" id="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Melding opslaan">
        </form>
        </div>
    </main>
</body>

</html>
