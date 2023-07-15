<!DOCTYPE html>
<html>
<head>
    <title>Admin Interface</title>
    <link rel="stylesheet" href="../vues/assets/style/admin.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#" ><?php echo $email ?></a></li>
            <li><a href="#" style="color:green">Articles</a></li>
            <li><a href="/mvc/index.php/admin/categories">Categories</a></li>
            <li><a href="/mvc/index.php/disconnect">Déconnexion</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Interface administrateur</h1>

        <h2>Liste des articles</h2>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Contenue</th>
                    <th>Date de creation</th>
                    <th>Date de modification</th>
                    <th>Categorie</th>                   
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($articles as $article): ?>
                <tr>
                    <td><?php echo $article->getId() ?></td>
                    <td><?php echo $article->getTitre() ?></td>
                    <td><?php echo $article->getContenu() ?></td>
                    <td><?php echo $article->getDateCrea() ?></td>
                    <td><?php echo $article->getDatemod() ?></td>
                    <td><?php echo $article->getCategorie() ?></td>

                    <td>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $article->getId() ?>">
                        <input type="submit" value="Supprimer" style="background-color:red;color:white">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div id="popup" class="popup">
                            <div class="popup-content">
                                <center><h2>Modifier un article</h2></center>
                                <form id="myForm" action="" method="post">
                                <label for="name">ID:</label>
                                <input type="text" name="mod" value="">
                                <label for="name">Titre:</label>
                                <input type="text" id="titre" name="title" required>
                                <label for="email">Contenu:</label>
                                <textarea  style="width:400px;height:200px" name="contenu" required ></textarea><br>
                                <select name="categorie">
                                <?php foreach($categories as $categorie): ?>
                                 <option>
                                     <?php echo $categorie->getId() ?>
                                </option>
                
                                 <?php endforeach; ?>

                                 </select><br>
                                 <input type="submit" value="modifier" style="background-color:green;color:white">
                                </form>
                            </div>
                            </div>
        <h2>Ajouter un article</h2>

        <form action="" method="post">
            <label for="nom">Titre</label>
            <input type="text" id="nom" name="titre" required>
            <label for="email">Contenu:</label>
            <textarea  style="width:800px;height:200px" name="contenu" required ></textarea><br>
            <label for="categorie">Categorie:</label>
            <select name="categorie">
            <?php foreach($categories as $categorie): ?>
                <option>
                <?php echo $categorie->getId() ?>
                </option>
                
                <?php endforeach; ?>

            </select><br>
            <input type="submit" value="Ajouter" style="background-color:green;color:white">
        </form>
    </div>
    <script src="../vues/assets/script/script.js"></script>
</body>
</html>
