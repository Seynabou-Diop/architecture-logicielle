<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Actu Polytech</title>
</head>
<body>

    <h1>ACTUALITÉS POLYTECHNICIENNES</h1>

    <?php if ($isAdminLoggedIn): ?>

        <h1>Espace Administrateur</h1>
        <a href="/src/controllers/deconnexion.php" id="deconnexion">Se déconnecter</a>

    <?php else: ?>

        <a href="/src/controllers/authenticationController.php" id="admin">ADMIN</a>

    <?php endif; ?>

    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php foreach ($data->categories as $category): ?>
            <li>
                <a href="index.php?action=categorie&id=<?= $category->id ?>">
                    <?= $category->libelle ?>
                </a>
                <?php if ($isAdminLoggedIn): ?>
                    <a href="/src/controllers/CategoryController.php?action=delete&id=<?= $category->id ?>" class="category-icon" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </a>
                    <a href="/src/controllers/CategoryController.php?action=update&id=<?= $category->id ?>" class="category-icon" title="Modifier">
                        <i class="fas fa-edit"></i>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        <?php if ($isAdminLoggedIn): ?>
            <li>
                <a href="/src/controllers/CategoryController.php?action=create" class="category-icon" title="Créer une catégorie">
                    <i class="fas fa-plus"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <h2>Les dernières actualités</h2>
    
    <?php if (isset($errorMessage)): ?>
        <p class="error" style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <?php if ($isAdminLoggedIn): ?>
        <a href="/src/controllers/ArticleController.php?action=create" class="articles-icon" title="Créer un article">
            <i class="fas fa-plus"></i>
        </a><br><br>
    <?php endif; ?>

    <?php if (empty($data->articles)): ?>
        <p>Aucun article n'est encore disponible à ce jour pour cette catégorie.</p>
    <?php else: ?>
        <?php foreach ($data->articles as $article): ?>
            <div class="actu">
                <h3><?= $article->titre ?></h3>
                <p><?= $article->contenu ?></p>
                <?php if ($isAdminLoggedIn): ?>
                    <a href="/src/controllers/ArticleController.php?action=update&id=<?= $article->id ?>" class="article-icon" title="Modifier">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/src/controllers/ArticleController.php?action=delete&id=<?= $article->id ?>" class="article-icon" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
