<?php
require('UtilisateurService.php');

class UtilisateurSoapService {

public function getUser($login, $password) {
    // Appeler la méthode correspondante de la classe UtilisateurService
    $utilisateurService = new UtilisateurService();
    return $utilisateurService->getUser($login, $password);
}

public function saveUser($login, $mdp, $role) {
    // Appeler la méthode correspondante de la classe UtilisateurService
    $utilisateurService = new UtilisateurService();
    return $utilisateurService->saveUser($login, $mdp, $role);
}

public function updateUser($id, $login, $mdp, $role) {
    // Appeler la méthode correspondante de la classe UtilisateurService
    $utilisateurService = new UtilisateurService();
    return $utilisateurService->updateUser($id, $login, $mdp, $role);
}

public function deleteUser($id) {
    // Appeler la méthode correspondante de la classe UtilisateurService
    $utilisateurService = new UtilisateurService();
    return $utilisateurService->deleteUser($id);
}

}


?>