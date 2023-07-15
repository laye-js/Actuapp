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
$serveurSOAP = new SoapServer(null, array('uri' => 'http://localhost/mvc/clientSoap.php/monservice'));

// Liaison du service à la classe du service
$serveurSOAP->setClass('MonService');

// Traitement de la requête SOAP
$serveurSOAP->handle();
?>
<?php
// Paramètres du service
$wsdl = 'http://localhost/mvc/clientsoap.php/monservice?wsdl';
$endpoint = 'http://localhost/mvc/clientsoap.php/monservice';

// Création d'un client SOAP
$client = new SoapClient($wsdl, array('location' => $endpoint));

// Appel de la méthode du service
$resultat = $client->direBonjour('John');

// Affichage du résultat
echo $resultat;
?>
