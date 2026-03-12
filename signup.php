<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h3>Sign Up</h3>
        </div>
        <div class="input-container">
            <input type="text" placeholder="Username" required> 
            <input type="email" placeholder="Email Address " required> 
            <input type="password" placeholder="Creat Password" required>
            <input type="password" placeholder="Re-Enter password" required>     
        <div class="botton">
            <button class="submit" type="submit"><a href="login.php">Sign Up</a></button> 
        </div>  
        <div class="signup">
             Already have an account<a href="login.php"> log In</a>  
        </div>
    </div>


</body>