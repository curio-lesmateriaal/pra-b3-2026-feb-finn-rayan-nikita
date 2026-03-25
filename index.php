<?php 
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: http://pra-b3-2026-feb-finn-rayan-nikita.test/task/done.php");
}

?>

<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <form action="app/Http//Controllers/logincontroller.php" method="POST">
        <div class="form-container">
            <div class="input-container">
                <input type="text" placeholder="username" name="username" id="username">
                <input type="password" placeholder="password" name="password" id="password">
            </div>
            <div class="button">
                <button class="submit" type="submit">Log in</button>
            </div>
            <div class="signup">
                Don't Have An Account?<a href="signup.php"> sign up</a>
            </div>
        </div>
        <footer>
            <p>&copy; 2026 pra-b3 Nikita-Finn-Rayan</p>
        </footer>
    </form>

</body>

</html>