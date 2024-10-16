<?php

function getAliments($mysqlClient, $sort = null)
{
    $query = "SELECT * FROM Foods";

    if ($sort == 'calories') {
        $query .= " ORDER BY calories ASC";
    } elseif ($sort == 'sucres') {
        $query .= " ORDER BY sucre ASC";
    } elseif ($sort == 'nom') {
        $query .= " ORDER BY nom ASC";
    }

    $stmt = $mysqlClient->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
