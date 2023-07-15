<?php
class ArticleService{
   
    public static function save($titre,$contenu,$categorie)
    {
        ArticleDao::save($titre,$contenu,$categorie);
    }
    public static function update($id,$titre,$contenu,$categorie)
    {
        ArticleDao::update($id,$titre,$contenu,$categorie);
    }

    public static function delete($id)
    {
        ArticleDao::delete($id);
    }



 
}
?>