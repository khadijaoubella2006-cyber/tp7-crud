<?php
require_once "../database/connexion.php";
$formations = $pdo->query("SELECT * FROM formations")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["nom_module"]) && isset($_POST["Formations_id"])) {
    $sql = "INSERT INTO module (nom_module, Formations_id) VALUES (:nom_module, :Formations_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "nom_module" => $_POST["nom_module"],
        "Formations_id" => $_POST["Formations_id"]
    ]);
    header("Location: index.php");
    exit;
}
?>
<h1>Ajouter un module</h1>
<form method="POST">
  Nom Module : <input type="text" name="nom_module" required><br><br>
  Formation :
  <select name="Formations_id" required>
    <?php foreach ($formations as $f) { ?>
      <option value="<?= $f["id"] ?>"><?= htmlspecialchars($f["titre"]) ?></option>
    <?php } ?>
  </select><br><br>
  <button>Ajouter</button>
</form>
<a href="index.php">Retour</a>