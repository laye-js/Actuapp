<?php

class ArticleController {
    public function afficherListeArticles() {
        $categories=CategorieDao::getCategories();
         $articles = ArticleDao::getAll();
        
        require('vues/listeArticles.php');
    }
    public function afficherListeArticleParCategorie($categorie){
        $categories=CategorieDao::getCategories();
        $articles = ArticleDao::getByCathegorie($categorie);
        require('vues/listeArticles.php');

    }
    public static function save($titre,$contenu,$categorie){
        ArticleService::save($titre,$contenu,$categorie);
    }
    public static function update($id,$titre,$contenu,$categorie){
        ArticleService::update($id,$titre,$contenu,$categorie);
    }
    public static function delete($id){
        ArticleService::delete($id);
        header("location:/mvc/index.php/admin");
    }

}
?>
