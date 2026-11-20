<?php
require_once "../database/connexion.php";
if (!isset($_GET["id"])) die("ID manquant.");
$id = $_GET["id"];

$formations = $pdo->query("SELECT * FROM formations")->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM etudiane WHERE id = :id");
$statement->execute(["id" => $id]);
$etudiant = $statement->fetch(PDO::FETCH_ASSOC);
if (!$etudiant) die("Etudiant introuvable.");

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"])) {
    $sql = "UPDATE etudiane SET nom = :nom, prenom = :prenom, email = :email, Formations_id = :Formations_id WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "email" => $_POST["email"],
        "Formations_id" => $_POST["Formations_id"],
        "id" => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Modifier</title></head>
<body>
    <h1>Modifier un étudiant</h1>
    <form method="POST">
        <label>Nom :</label><input type="text" name="nom" value="<?php echo htmlspecialchars($etudiant["nom"]); ?>" required><br><br>
        <label>Prénom :</label><input type="text" name="prenom" value="<?php echo htmlspecialchars($etudiant["prenom"]); ?>" required><br><br>
        <label>Email :</label><input type="email" name="email" value="<?php echo htmlspecialchars($etudiant["email"]); ?>" required><br><br>
        <label>Formation :</label>
        <select name="Formations_id">
            <?php foreach ($formations as $f) { ?>
                <option value="<?php echo $f["id"]; ?>" <?php echo $f["id"]==$etudiant["Formations_id"] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($f["titre"]); ?>
                </option>
            <?php } ?>
        </select><br><br>
        <button type="submit">Modifier</button>
    </form><br>
    <a href="index.php">Retour</a>
</body>
</html>