<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mglsi/archi/assets/css/style-crud.css">
    <title>Création de catégorie</title>
</head>
<body>
    <h1>Création de catégorie</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="CategoryController.php?action=create" method="POST">
        <input type="hidden" name="action" value="create">

        <label for="libelle">Libellé :</label>
        <input type="text" id="libelle" name="libelle" required>

        <button type="submit">Créer</button>
    </form>
</body>
</html>
