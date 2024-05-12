<?php
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$numerotl = $_POST['numerotl'];
$typevoyage = $_POST['typevoyage'];
$destination = $_POST['destination'];
$hotel = $_POST['hotel'];
$date = $_POST['date'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(prenom, nom, email, numerotl, typevoyage, destination, hotel, date)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $prenom, $nom, $email, $numerotl, $typevoyage, $destination, $hotel, $date);
    $stmt->execute();
    echo "Registration successful";
    $stmt->close();
    $conn->close();
}
?>