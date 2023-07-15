<?php
class CategorieService{
   
    public static function save($libelle)
    {
        CategorieDao::save($libelle);
    }
    public static function update($id,$libelle)
    {
        CategorieDao::update($id,$libelle);
    }

    public static function delete($id)
    {
        CategorieDao::delete($id);
    }



 
}
?>