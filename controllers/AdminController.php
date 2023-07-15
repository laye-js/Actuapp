<?php

class AdminController {
    public function afficher($email) {
        $categories=CategorieDao::getCategories();
         $articles = ArticleDao::getAll();
        
        require('vues/AdminVue.php');
       
    }
    public function afficherCategories($email) {
     
     $categories=CategorieDao::getCategories();
     
     require('vues/Categories.php');
    
 }
 public function getCategories() {
     
     $categories=CategorieDao::getCategories();
     
    
 }
 public static function save($libelle)
    {
        CategorieService::save($libelle);
    }
    public static function update($id,$libelle)
    {
        CategorieService::update($id,$libelle);
    }

    public static function delete($id)
    {
        CategorieService::delete($id);
    }

}
?>
