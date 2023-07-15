<?php

// index.php

require('modeles/Article.php');
require('modeles/Categorie.php');
require('dao/ArticleDao.php');
require('dao/UtilisateurDao.php');
require('services/ArticleService.php');
require('services/CategorieService.php');
require('services/UtilisateurService.php');
require('controllers/ArticleController.php');
require('controllers/AdminController.php');
require('controllers/FormController.php');
require("dao/Database.php");
require("dao/CategorieDao.php");

// Récupère le verbe HTTP (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Récupère l'URI
$uri = $_SERVER['REQUEST_URI'];

// Endpoint pour récupérer tous les articles
if ($method === 'GET' && $uri === '/mvc/index.php/articles') {
    $articles = ArticleDao::getAll();

    // Convertit les objets Article en tableau associatif
    $articlesArray = [];
    foreach ($articles as $article) {
        $articlesArray[] = [
            'id' => $article->getId(),
            'titre' => $article->getTitre(),
            'libelle' => $article->getLibelle(),
            'contenu' => $article->getContenu(),
            'dateCreation' => $article->getDateCrea(),
            'dateModification' => $article->getDatemod(),
            'categorie' => $article->getCategorie()
        ];
    }

    $response = json_encode($articlesArray);
    header('Content-Type: application/json');
    echo $response;
    exit;
}

// Endpoint pour créer un nouvel article
if ($method === 'POST' && $uri === '/mvc/index.php/articles') {
    // Récupère les données du corps de la requête
    $postData = file_get_contents('php://input');
    $articleData = json_decode($postData, true);

    // Vérifie les données obligatoires
    if (!isset($articleData['titre']) || !isset($articleData['contenu']) || !isset($articleData['categorie'])) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['message' => 'Missing required data']);
        exit;
    }

    // Crée le nouvel article
    $title = $articleData['titre'];
    $content = $articleData['contenu'];
    $category = $articleData['categorie'];
    ArticleService::save($title, $content, $category);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Article created successfully']);
    exit;
}

// Endpoint pour mettre à jour un article
if ($method === 'PUT' && preg_match('/^\/mvc\/index.php\/articles\/(\d+)$/', $uri, $matches)) {
    $articleId = $matches[1];

    // Récupère les données du corps de la requête
    $putData = file_get_contents('php://input');
    $articleData = json_decode($putData, true);

    // Vérifie les données obligatoires
    if (!isset($articleData['titre']) || !isset($articleData['contenu']) || !isset($articleData['categorie'])) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['message' => 'Missing required data']);
        exit;
    }

    // Met à jour l'article
    $title = $articleData['titre'];
    $content = $articleData['contenu'];
    $category = $articleData['categorie'];
    ArticleService::update($articleId, $title, $content, $category);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Article updated successfully']);
    exit;
}

// Endpoint pour supprimer un article
if ($method === 'DELETE' && preg_match('/^\/mvc\/index.php\/articles\/(\d+)$/', $uri, $matches)) {
    $articleId = $matches[1];
    ArticleService::delete($articleId);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Article deleted successfully']);
    exit;
}

// Endpoint pour récupérer toutes les catégories
if ($method === 'GET' && $uri === '/mvc/index.php/categories') {
    $categories = CategorieDao::getCategories();

    // Convertit les objets Categorie en tableau associatif
    $categoriesArray = [];
    foreach ($categories as $categorie) {
        $categoriesArray[] = [
            'id' => $categorie->getId(),
            'libelle' => $categorie->getLibelle()
        ];
    }

    $response = json_encode($categoriesArray);
    header('Content-Type: application/json');
    echo $response;
    exit;
}

// Endpoint pour créer une nouvelle catégorie
if ($method === 'POST' && $uri === '/mvc/index.php/categories') {
    // Récupère les données du corps de la requête
    $postData = file_get_contents('php://input');
    $categoryData = json_decode($postData, true);

    // Vérifie les données obligatoires
    if (!isset($categoryData['libelle'])) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['message' => 'Missing required data']);
        exit;
    }

    // Crée la nouvelle catégorie
    $libelle = $categoryData['libelle'];
    CategorieService::save($libelle);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Category created successfully']);
    exit;
}

// Endpoint pour mettre à jour une catégorie
if ($method === 'PUT' && preg_match('/^\/mvc\/index.php\/categories\/(\d+)$/', $uri, $matches)) {
    $categoryId = $matches[1];

    // Récupère les données du corps de la requête
    $putData = file_get_contents('php://input');
    $categoryData = json_decode($putData, true);

    // Vérifie les données obligatoires
    if (!isset($categoryData['libelle'])) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['message' => 'Missing required data']);
        exit;
    }

    // Met à jour la catégorie
    $libelle = $categoryData['libelle'];
    CategorieService::update($categoryId, $libelle);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Category updated successfully']);
    exit;
}

// Endpoint pour supprimer une catégorie
if ($method === 'DELETE' && preg_match('/^\/mvc\/index.php\/categories\/(\d+)$/', $uri, $matches)) {
    $categoryId = $matches[1];
    CategorieService::delete($categoryId);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Category deleted successfully']);
    exit;
}

// Endpoint pour le service SOAP Utilisateur
if ($method === 'POST' && $uri === '/mvc/index.php/soap/utilisateurs') {
    // Crée une instance du service Utilisateur
    $utilisateurService = new UtilisateurService();

    // Crée un serveur SOAP
    $server = new SoapServer(null, [
        'uri' => '/mvc/index.php/soap/utilisateurs'
    ]);

    // Ajoute le service Utilisateur au serveur SOAP
    $server->setObject($utilisateurService);

    // Gère la requête SOAP
    ob_start();
    $server->handle();
    ob_end_clean();
    exit;
}

// ...
?>


// Si aucune correspondance d'endpoint n'est trouvée, renvoie une réponse 404
header('Content-Type: application/json');
http_response_code(404);
echo json_encode(['message' => 'Endpoint not found']);





?>