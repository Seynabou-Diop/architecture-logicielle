<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de catégorie</title>
</head>
<body>
    <h1>Modification de catégorie</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="CategoryController.php?action=update&id=<?= $category->id; ?>" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo $category->id; ?>">

        <label for="libelle">Libellé :</label>
        <input type="text" id="libelle" name="libelle" value="<?php echo $category->libelle; ?>" required>

        <button type="submit">Modifier</button>
    </form>
</body>
</html>
