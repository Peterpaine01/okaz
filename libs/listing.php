<?php

require_once 'libs/pdo.php';

function getListings(PDO $pdo): array
{
    $sql = "SELECT listings.id, listings.title, listings.description, listings.price, listings.image
            FROM listings";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getListingById(PDO $pdo, int $id): array|bool
{ 
  $sql = "SELECT listings.id, listings.title, listings.description, listings.price, listings.image
          FROM listings
          WHERE listings.id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(":id", $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}