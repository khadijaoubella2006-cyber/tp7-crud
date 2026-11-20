<?php
require_once "../database/connexion.php";
if (!isset($_GET["id"])) die("ID manquant.");
$id = $_GET["id"];
$statement = $pdo->prepare("SELECT * FROM formations WHERE id = :id");
$statement->execute(["id" => $id]);
$formation = $statement->fetch(PDO::FETCH_ASSOC);
if (!$formation) die("Formation introuvable.");
if (isset($_POST["titre"]) && isset($_POST["prix"])) {
    $sql = "UPDATE formations SET titre = :titre, prix = :prix WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(["titre" => $_POST["titre"], "prix" => $_POST["prix"], "id" => $id]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Modifier</title></head>
<body>
    <h1>Modifier une formation</h1>
    <form method="POST">
        <label>Titre :</label><input type="text" name="titre" value="<?php echo htmlspecialchars($formation["titre"]); ?>" required><br><br>
        <label>Prix :</label><input type="number" name="prix" value="<?php echo $formation["prix"]; ?>" required><br><br>
        <button type="submit">Modifier</button>
    </form><br>
    <a href="index.php">Retour</a>
</body>
</html>