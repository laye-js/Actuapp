<?php
// Définition de la classe du service SOAP
class MonService
{
    // Méthode du service SOAP
    public function direBonjour($nom)
    {
        return "Bonjour, " . $nom . " !";
    }
}

// Création d'une instance du service
$service = new MonService();

// Création du serveur SOAP
$serveurSOAP = new SoapServer(null, array('uri' => 'http://localhost/monservice'));

// Liaison du service à la classe du service
$serveurSOAP->setClass('MonService');

// Traitement de la requête SOAP
$serveurSOAP->handle();
?>