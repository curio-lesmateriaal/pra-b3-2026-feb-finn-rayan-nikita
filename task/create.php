<?php require_once '../backend/conn.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../header.php'; ?>
</head>

<body>

    

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="attractie">Titel:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" placeholder="titel">
            </div>
            <div class="form-group">
                <label for="type">Afdeling</label>
                <select name="group" id="group">
                <option value="">Kies een afdeling</option>
                <option value="A">Management</option>
                <option value="B">It</option>
                <option value="C">Onderhoud</option>
                <option value="D">Facilitair</option>
                <option value="E">e</option>
                <option value="F">f</option>
        </select>
            </div>
            <div class="form-group">
                <label for="prioriteit">Done:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Done or niet done</label>

            </div>
            <div class="form-group">
                <label for="melder">Username:</label>
                <input type="text" name="melder" id="melder" class="form-input" placeholder="username">
            </div>
            <div class = "form-group">
                <label for="datetime">Deadline:</label>
                <input type="datetime-local" name="datetime" id="datetime" class="form-input">
            </div>
            <div class="form-group">
                <label for="info">Beschrijving:</label>
                <input type="text" name="info" id="info" class="form-input" placeholder="beschrijving">
            </div>

        


    </div>
        <div class="form-group">

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>