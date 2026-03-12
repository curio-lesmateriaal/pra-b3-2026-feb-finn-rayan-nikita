
<!doctype html>
<html lang="nl">

<head>

</head>

<body>
    <div class="container">
        <h1>Nieuwe taak</h1>

        <form action="../app/Http/Controllers/takencontroller.php" method="POST">
            <div class="form-group">
                <label for="titel">Titel</label>
                <input type="text" name="titel" id="titel" class="form-input">
            </div>

            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Done</label>
                <input type="checkbox" name="status" id="status" class="form-input">
            </div>

            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input">
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-input">
            </div>

            <input type="hidden" name="action" id="action" value="create">
            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>