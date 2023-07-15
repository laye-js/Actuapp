<?php
class FormController {


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'];
            $password = $_POST['mdp'];

            if ($this->validateLogin($username, $password)) {
                session_start();
                $_SESSION["email"]=$username;
                $_SESSION["password"]=$password;
                header('Location: /mvc/index.php/admin');
                exit();
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        require 'vues/form.php';
    }

    private function validateLogin($username, $password) {

        $validUsername = 'admin@admin.com';
        $validPassword = 'passer';

        if ($username === $validUsername && $password === $validPassword) {
            return true;
        } else {
            return false;
        }
    }
}

?>