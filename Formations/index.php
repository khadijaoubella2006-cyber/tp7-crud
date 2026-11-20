<?php
require_once "../database/connexion.php";
$statement = $pdo->query("SELECT * FROM formations");
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Formations</title>
<link rel="stylesheet" href="../css/style.css"></head>
<body>
    <h1>Liste des formations</h1>
    <a href="create.php">Ajouter une formation</a> 
     <a href="../index.php">Accueil</a>
    <br><br>
    <table border="1">
        <tr><th>ID</th><th>Titre</th><th>Prix</th><th>Actions</th></tr>
        <?php foreach ($formations as $f) { ?>
        <tr>
            <td><?php echo $f["id"]; ?></td>
            <td><?php echo htmlspecialchars($f["titre"]); ?></td>
            <td><?php echo $f["prix"]; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $f["id"]; ?>">Modifier</a> 
                <a href="delete.php?id=<?php echo $f["id"]; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>