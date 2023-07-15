<!DOCTYPE html>
<html>
<head>
    <title>Admin Interface</title>
    <link rel="stylesheet" href="../../vues/assets/style/admin.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#" ><?php echo $email ?></a></li>
            <li><a href="/mvc/index.php/admin">Articles</a></li>
            <li><a href="#" style="color:green">Categories</a></li>
            <li><a href="/mvc/index.php/disconnect">Déconnexion</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Interface administrateur</h1>

        <h2>Liste des Categories</h2>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Libelle</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $categorie): ?>
                <tr>
                    
                     <td><?php echo $categorie->getId() ?></td>

                    <td><?php echo $categorie->getLibelle() ?></td>

                  
                    <td>
                    <form action="" method="post">
                        <input type="hidden" name="idCat" value="<?php echo $categorie->getId() ?>">
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
                                <input type="text" name="modCat" value="">
                                <label for="name">libelle:</label>
                                <input type="text" id="titre" name="libelles" required>
                                <input type="submit" value="modifier" style="background-color:green;color:white">
                                </form>
                            </div>
                            </div>
        <h2>Ajouter une categorie</h2>

        <form action="" method="post">
            <label for="nom">libelle</label>
            <input type="text" id="nom" name="libelle" required>
            <input type="submit" value="Ajouter" style="background-color:green;color:white">
        </form>
    </div>
</body>
</html>
