<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mglsi/archi/assets/css/style-crud.css">
    <title>Document</title>
</head>
<body>
    <h1>Creer un article</h1>

    <form action="ArticleController.php?action=create" method="POST">
        <input type="text" name="titre" placeholder="Titre de l'article" required>
        <textarea name="contenu" placeholder="Contenu de l'article" required></textarea>
        <select name="categorie">
            <option value="1">Sport</option>
            <option value="2">Santé</option>
            <option value="3">Education</option>
            <option value="4">Politique</option>
        </select>
        <button type="submit">Enregistrer</button>
    </form>

</body>
</html>