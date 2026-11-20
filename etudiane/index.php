<?php
require_once "../database/connexion.php";

$sql = "SELECT etudiane.*, formations.titre 
        FROM etudiane 
        LEFT JOIN formations ON etudiane.Formations_id = formations.id";
$statement = $pdo->query($sql);
$etudiants = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Etudiants</title>
<link rel="stylesheet" href="../css/style.css"></head>
<body>
    <h1>Liste des étudiants</h1>
    <a href="create.php">Ajouter un étudiant</a> 
    <a href="../index.php">Accueil</a>
    <br><br>
    <table border="1">
        <tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Formation</th><th>Actions</th></tr>
        <?php foreach ($etudiants as $e) { ?>
        <tr>
            <td><?php echo $e["id"]; ?></td>
            <td><?php echo htmlspecialchars($e["nom"]); ?></td>
            <td><?php echo htmlspecialchars($e["prenom"]); ?></td>
            <td><?php echo htmlspecialchars($e["email"]); ?></td>
            <td><?php echo htmlspecialchars($e["titre"] ?? 'Aucune'); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $e["id"]; ?>">Modifier</a> 
                <a href="delete.php?id=<?php echo $e["id"]; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>