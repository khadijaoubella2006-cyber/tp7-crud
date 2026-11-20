<?php
require_once "../database/connexion.php";
if (!isset($_GET["id"])) die("ID manquant.");
$id = $_GET["id"];

$formations = $pdo->query("SELECT * FROM formations")->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM module WHERE id = :id");
$statement->execute(["id" => $id]);
$module = $statement->fetch(PDO::FETCH_ASSOC);
if (!$module) die("Module introuvable.");

if (isset($_POST["nom_module"]) && isset($_POST["Formations_id"])) {
    $sql = "UPDATE module SET nom_module = :nom_module, Formations_id = :Formations_id WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "nom_module" => $_POST["nom_module"],
        "Formations_id" => $_POST["Formations_id"],
        "id" => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Modifier un module</title></head>
<body>
    <h1>Modifier un module</h1>
    <form method="POST">
        <div>
            <label>Nom Module :</label>
            <input type="text" name="nom_module" value="<?php echo htmlspecialchars($module["nom_module"]); ?>" required>
        </div><br>
        <div>
            <label>Formation :</label>
            <select name="Formations_id">
                <?php foreach ($formations as $f) { ?>
                    <option value="<?php echo $f["id"]; ?>" <?php echo $f["id"]==$module["Formations_id"] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($f["titre"]); ?>
                    </option>
                <?php } ?>
            </select>
        </div><br>
        <button type="submit">Modifier</button>
    </form><br>
    <a href="index.php">Retour</a>
</body>
</html>