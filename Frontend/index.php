<?php

require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/config/databaseconnect.php');
require_once(__DIR__ . '/function/function.php');


$sort = isset($_GET['sort']) ? $_GET['sort'] : null;
$aliments = getAliments($mysqlClient, $sort);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Liste des Aliments</title>
</head>

<body>
    <div class="container">
        <h1>Liste des Aliments</h1>
        <div class="sorting">
            <a href="index.php?sort=nom">Trier par Nom</a>
            <a href="index.php?sort=calories">Trier par Calories</a>
            <a href="index.php?sort=sucre">Trier par Sucre</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Marque</th>
                    <th>Sucre (g)</th>
                    <th>Calories</th>
                    <th>Graisses (g)</th>
                    <th>Protéines (g)</th>
                    <th>Bio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aliments as $aliment): ?>
                    <tr>
                        <td data-label="Nom"><?= htmlspecialchars($aliment['nom']) ?></td>
                        <td data-label="Marque"><?= htmlspecialchars($aliment['marque']) ?></td>
                        <td data-label="Sucre (g)"><?= htmlspecialchars($aliment['sucre']) ?></td>
                        <td data-label="Calories"><?= htmlspecialchars($aliment['calories']) ?></td>
                        <td data-label="Graisses (g)"><?= htmlspecialchars($aliment['graisses']) ?></td>
                        <td data-label="Protéines (g)"><?= htmlspecialchars($aliment['proteines']) ?></td>
                        <td data-label="Bio"><?= $aliment['bio'] ? 'Oui' : 'Non' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>