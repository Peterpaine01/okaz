<?php

function getCategories(PDO $pdo): array
{
    $sql = "SELECT * FROM categories";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

}

function getCategoryById(PDO $pdo, int $id): array
{ 
    $categories = getCategories($pdo);
    return  $categories[$id];
}