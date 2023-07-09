<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mglsi/archi/assets/css/style-crud.css">
    <title>Modifier l'article</title>
</head>
<body>
    <h1>Modifier l'article</h1>

    <?php if (isset($errorMessage)): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form action="ArticleController.php?action=update&id=<?= $article->id ?>" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">

        <label for="title">Titre:</label>
        <input type="text" name="titre" id="title" value="<?php echo $article->titre; ?>"><br>

        <label for="content">Contenu:</label>
        <textarea name="contenu" id="content"><?php echo $article->contenu; ?></textarea><br>

        <select name="categorie">
            <option value="1">Sport</option>
            <option value="2">Santé</option>
            <option value="3">Education</option>
            <option value="4">Politique</option>
        </select>

        <input type="submit" value="Modifier">
    </form>
</body>
</html>