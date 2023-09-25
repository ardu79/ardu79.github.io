<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises du formulaire
    $nom = $_POST["nom"];
    $reference = $_POST["reference"];

    // Connexion à la base de données (utilisez les mêmes paramètres que dans votre code précédent)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abonnement";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer les données de confirmation de paiement
    $sql = "INSERT INTO confirmation_paiement (nom, reference) VALUES ('$nom', '$reference')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === true) {
        echo "Paiement confirmé avec succès.";
    } else {
        echo "Erreur lors de la confirmation du paiement : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
