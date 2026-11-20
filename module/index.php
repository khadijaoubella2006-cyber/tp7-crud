<?php
require_once "../database/connexion.php";

$sql = "SELECT module.*, formations.titre 
        FROM module 
        LEFT JOIN formations ON module.Formations_id = formations.id";
$statement = $pdo->query($sql);
$modules = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modules</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Liste des modules</h1>
    <a href="create.php">Ajouter un module</a> 
     <a href="../index.php">Accueil</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Module</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modules as $m) { ?>
                <tr>
                    <td><?php echo $m["id"]; ?></td>
                    <td><?php echo htmlspecialchars($m["nom_module"]); ?></td>
                    <td><?php echo htmlspecialchars($m["titre"] ?? 'Aucune'); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $m["id"]; ?>">Modifier</a> 
                        <a href="delete.php?id=<?php echo $m["id"]; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>