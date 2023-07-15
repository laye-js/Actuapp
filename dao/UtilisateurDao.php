<?php
    class UtilisateurDao{
        public static function getUser($login,$password){
        $bdd=Database::getInstance();
        $sql = 'SELECT * FROM user where login=? and mdp=? ';
        $result = $bdd->prepare($sql);
        $result->execute([$login,$password]);
        $user=$result->fetch();
        $utilisateur=new Utilisateur($user["login"],$user["password"],$user["role"]);
        return $utilisateur;
    }
    public static function save($login,$mdp,$role)
    {

        $bdd=Database::getInstance();

        $sql = 'INSERT INTO user(login,mdp,role) values(?,?,?) ';
        $result = $bdd->prepare($sql);
        $result->execute([$login,$mdp,$role]);
        echo"<script>alert('Categorie ajouté avec success')</script>";
    }

    public static function update($id,$login,$mdp,$role)
    {
        $bdd=Database::getInstance();
        $sql = "UPDATE user SET login=?,mdp=?,role=? WHERE id = ?";
        $result = $bdd->prepare($sql);
        $result->execute([$login,$mdp,$role,$id]);
        echo"<script>alert('Categorie modifié avec success')</script>";
    }

    public static function delete($id)
    {
        $bdd=Database::getInstance();
        $sql = "DELETE  FROM user WHERE id =".$id;
        $result = $bdd->prepare($sql);
        $result->execute();
        echo"<script>alert('Categorie supprimé avec success')</script>";
    }


    }
?>