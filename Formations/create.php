<?php
require_once "../database/connexion.php";
if (isset($_POST["titre"]) && isset($_POST["prix"])) {
    $sql = "INSERT INTO formations (titre, prix) VALUES (:titre, :prix)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["titre" => $_POST["titre"], "prix" => $_POST["prix"]]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Ajouter</title></head>
<body>
    <h1>Ajouter une formation</h1>
    <form method="POST">
        <label>Titre :</label><input type="text" name="titre" required><br><br>
        <label>Prix :</label><input type="number" name="prix" required><br><br>
        <button type="submit">Ajouter</button>
    </form><br>
    <a href="index.php">Retour</a>
</body>
</html>