<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $abonnement = $_POST["abonnement"];
    $pays = $_POST["pays"];
    $paiement = $_POST["paiement"];

    // Connexion à la base de données
    $servername = "localhost"; // Remplacez par l'adresse de votre serveur MySQL
    $username = "root"; // Remplacez par votre nom d'utilisateur MySQL
    $password = ""; // Remplacez par votre mot de passe MySQL
    $dbname = "abonnement"; // Remplacez par le nom de votre base de données

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer les données dans une table (par exemple, "abonnements")
    $sql = "INSERT INTO abonnements (nom, prenom, telephone, email, abonnement, pays, paiement)
            VALUES ('$nom', '$prenom', '$telephone', '$email', '$abonnement', '$pays', '$paiement')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === true) {
        echo "Inscription réussie ! Les données ont été enregistrées.";
    } else {
        echo "Erreur lors de l'enregistrement des données : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
