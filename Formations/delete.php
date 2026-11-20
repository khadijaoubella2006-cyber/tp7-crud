<?php
require_once "../database/connexion.php";
if (!isset($_GET["id"])) die("ID manquant.");
$statement = $pdo->prepare("DELETE FROM formations WHERE id = :id");
$statement->execute(["id" => $_GET["id"]]);
header("Location: index.php");
exit;
?>