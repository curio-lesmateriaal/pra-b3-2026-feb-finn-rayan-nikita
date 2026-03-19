<?php require_once '../backend/conn.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../head.php'; ?>
</head>

<body>

    

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="attractie">Naam van het taak:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="group" id="group">
                <option value="">Kies een type</option>
                <option value="A">a</option>
                <option value="B">b</option>
                <option value="C">c</option>
                <option value="D">d</option>
                <option value="E">e</option>
                <option value="F">f</option>
        </select>
            </div>
            <div class="form-group">
                <label for="prioriteit">Prioriteit:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Melding met prioriteit</label>

            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class = "form-group">
                <label for="newsletter">Nieuwsbrief:</label>
                <input type="checkbox" name="newsletter" id="newsletter">
                <label for="newsletter">Ik wil graag de nieuwsbrief ontvangen</label>
            </div>
            <div class="form-group">
                <label for="info">Overige info:</label>
                <textarea name="overig" id="overig" class="form-input" rows="4"></textarea>
            </div>

        


    </div>
        <div class="form-group">

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>