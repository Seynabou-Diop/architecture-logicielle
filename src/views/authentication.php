<!DOCTYPE html>
<html>
<head>
    <title>Authentification</title>
    <link rel="stylesheet" href="/assets/css/style-form.css">
</head>
<body>
    <h1>ACTUALITÉS POLYTECHNICIENNES</h1>
    <h2>Authentification de l'Administrateur</h2>
    
    <?php if (isset($errorMessage)) { ?>
    <p class="error" style="color: red;"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form action="../controllers/authenticationController.php" method="post" class="form">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type ="submit" value="Se connecter">
    </form>
</body>
</html>
