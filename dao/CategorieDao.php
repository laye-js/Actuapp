<?php
class CategorieDao{
    public static function getCategories(){
        $bdd=Database::getInstance();
        $sql = 'SELECT * FROM Categorie';
        $result = $bdd->query($sql);
        $articles = array();
         while ($row = $result->fetch()) {
            $categorie = new Categorie($row['id'], $row['libelle']);
            $categories[] = $categorie;
        }
        return $categories;
    }

    public static function save($libelle)
    {

        $bdd=Database::getInstance();

        $sql = 'INSERT INTO Categorie(libelle) values(?) ';
        $result = $bdd->prepare($sql);
        $result->execute([$libelle]);
        echo"<script>alert('Categorie ajouté avec success')</script>";
    }

    public static function update($id,$libelle)
    {
        $bdd=Database::getInstance();
        $sql = "UPDATE Categorie SET libelle=? WHERE id = ?";
        $result = $bdd->prepare($sql);
        $result->execute([$libelle,$id]);
        echo"<script>alert('Categorie modifié avec success')</script>";
    }

    public static function delete($id)
    {
        $bdd=Database::getInstance();
        $sql = "DELETE  FROM Categorie WHERE id =".$id;
        $result = $bdd->prepare($sql);
        $result->execute();
        echo"<script>alert('Categorie supprimé avec success')</script>";
    }

}
?>