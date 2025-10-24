<?php
@include('connexion.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];


    $sql = "INSERT INTO `propriètaire` 
            (`CIN`, `Nom_proprietaire`, `Prenom_proprietaire`, `Date_de_naissance`, `Email`, `Telephone`) 
            VALUES ('$cin', '$nom', '$prenom', '$date', '$email', '$telephone')";

    $result=mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Propriétaire ajouté avec succès !');</script>";
        
        header('Location: ./ListeProprietaire.php ');
    } 
}
?>