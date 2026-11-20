<?php
require_once "../database/connexion.php";

$formations = $pdo->query("SELECT * FROM formations")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"])) {
    $sql = "INSERT INTO etudiane (nom, prenom, email, Formations_id) VALUES (:nom, :prenom, :email, :Formations_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "email" => $_POST["email"],
        "Formations_id" => $_POST["Formations_id"]
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Ajouter un étudiant</title></head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form method="POST">
        <label>Nom :</label><input type="text" name="nom" required><br><br>
        <label>Prénom :</label><input type="text" name="prenom" required><br><br>
        <label>Email :</label><input type="email" name="email" required><br><br>
        <label>Formation :</label>
        <select name="Formations_id" required>
            <?php foreach ($formations as $f) { ?>
                <option value="<?php echo $f["id"]; ?>"><?php echo htmlspecialchars($f["titre"]); ?></option>
            <?php } ?>
        </select><br><br>
        <button type="submit">Ajouter</button>
    </form><br>
    <a href="index.php">Retour</a>
</body>
</html>