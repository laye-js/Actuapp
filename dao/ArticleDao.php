<?php
class ArticleDao{
    public static function getAll()
    {

        $bdd=Database::getInstance();

        $sql = 'SELECT * FROM Article INNER JOIN Categorie ON Article.categorie = Categorie.id ';
        $result = $bdd->query($sql);

        $articles = array();

            while ($row = $result->fetch()) {
                $article = new Article($row["Id"],$row['titre'], $row['libelle'], $row["contenu"],$row["dateCreation"],$row["dateModification"],$row["libelle"]);
                $articles[] = $article;
            }
        

        return $articles;
    }

    
    public static function save($titre,$contenu,$categorie)
    {

        $bdd=Database::getInstance();

        $sql = 'INSERT INTO Article(titre,contenu,dateCreation,dateModification,categorie) values(?,?,NOW(),NOW(),?) ';
        $result = $bdd->prepare($sql);
        $result->execute([$titre,$contenu,$categorie]);
    }

    public static function update($id,$titre,$contenu,$categorie)
    {
        $bdd=Database::getInstance();
        $sql = "UPDATE Article SET titre =?,contenu=?,dateModification=NOW(),categorie=? WHERE Id = ?";
        $result = $bdd->prepare($sql);
        $result->execute([$titre,$contenu,$categorie,$id]);
        echo"<script>alert('article modifié avec success')</script>";
    }

    public static function delete($id)
    {
        $bdd=Database::getInstance();
        $sql = "DELETE  FROM Article WHERE id =".$id;
        $result = $bdd->prepare($sql);
        $result->execute();
        echo"<script>alert('article supprimé avec success')</script>";
    }


    public static function getByCathegorie($cathegorie)
    {
        $bdd=Database::getInstance();
        $sql = 'SELECT * FROM Categorie INNER JOIN Article ON  Categorie.id=Article.categorie  where libelle = ? ';
        $result = $bdd->prepare($sql);
        $result->execute([$cathegorie]);
            while ($row = $result->fetch()) {
                $article = new Article($row["Id"],$row['titre'], $row['libelle'], $row["contenu"],$row["dateCreation"],$row["dateModification"],$row["libelle"]);
                $articles[] = $article;
            }
        
        return $articles;

    }
 
}
?>