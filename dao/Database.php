<?php
class Database{
    public static function getInstance(){
        try
    {
	$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;charset=utf8', 'root', 'root');
    return $bdd;
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }

    }

}
?>
