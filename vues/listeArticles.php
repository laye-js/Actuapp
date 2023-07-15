<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vues/assets/style/style.css">
    <title>Document</title>
 

</head>
<body>
    <div class="navbar">
        <div class="logo"><img src="../vues/assets/images/logo.jpeg" alt=""></div>
        <ul>
        <li><a href="/mvc/index.php/">Acceuil</a></li>
        <?php foreach($categories as $categorie): ?>
            <li><a href="/mvc/index.php/<?php echo $categorie->getLibelle() ?>"><?php echo $categorie->getLibelle(); ?></a></li>
            <?php endforeach; ?>
            <li><a href="/mvc/index.php/login">login</a></li>

        </ul>
    </div>
   <div class="body">
        <div class="head">
            <h1>Actualités Polytechniciennes</h1>
            <input type="search" class="searchbar" name="" placeholder="rechercher" id="">
        </div>
        <div class="block">
            <div class="left" id="all">
                <h2>Les dernières actualités</h2>
                <div id="articles"></div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour effectuer une requête GET vers l'API
        function getArticles() {
            fetch('/mvc/index.php/articles')
                .then(response => response.json())
                .then(data => {
                    // Récupère la div des articles
                    const articlesDiv = document.getElementById('articles');
                    
                    // Crée les éléments HTML pour chaque article
                    data.forEach(article => {
                        const articleDiv = document.createElement('div');
                        articleDiv.classList.add('article');

                        const title = document.createElement('h4');
                        title.textContent = article.titre;

                        const libelle = document.createElement('h3');
                        libelle.textContent = article.libelle;

                        const contenu = document.createElement('p');
                        contenu.textContent = article.contenu;

                        // Ajoute les éléments à la div des articles
                        articleDiv.appendChild(title);
                        articleDiv.appendChild(libelle);
                        articleDiv.appendChild(contenu);
                        articlesDiv.appendChild(articleDiv);
                    });
                })
                .catch(error => console.log(error));
        }

        // Appelle la fonction pour récupérer les articles au chargement de la page
        window.addEventListener('load', getArticles);
    </script>
</body>
</html>