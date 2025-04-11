<?php

require_once __DIR__ . '/../libs/pdo.php';


function getLatestListings(PDO $pdo, int $limit = 6): array
{
    $sql = "SELECT * FROM listings ORDER BY created_at DESC LIMIT :limit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getListings(PDO $pdo, array $filters = []): array
{
  $orderBy = "listings.id DESC";
  $conditions = [];
  $relevance = "";
  // var_dump_pre($filters);

  // filter search
  if(isset($filters["search"])) {
    // $conditions[] = "title LIKE :search OR description LIKE :search";
    $match = "MATCH(title, description) AGAINST(:search)";
    $conditions[] = $match;
    $relevance = ", $match as relevance";
    $orderBy = "relevance DESC";
  }

  // filter min price
  if(isset($filters["min_price"])){
    $conditions[] = "price >= :min_price";
  }

  // filter max price
  if(isset($filters["max_price"])){
    $conditions[] = "price <= :max_price";
  }

  // filter category
  if(isset($filters["category"])){
    $conditions[] = "category_id = :category";
  }

  $where = $conditions ? " WHERE " . implode(" AND ", $conditions) : "";
  $sql = "SELECT listings.id, listings.title, listings.description, listings.price, listings.image
          $relevance
          FROM listings
          $where
          ORDER BY $orderBy";
  $query = $pdo->prepare($sql);
  if (isset($filters["search"])) {
    $query->bindValue(":search", "%{$filters["search"]}%");
  }
  if (isset($filters["min_price"])) {
    $query->bindValue(":min_price", $filters["min_price"]);
  }
  if (isset($filters["max_price"])) {
    $query->bindValue(":max_price", $filters["max_price"]);
  }
  if (isset($filters["category"])) {
    $query->bindValue(":category", $filters["category"], PDO::PARAM_INT);
  }
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

function addListing(PDO $pdo, array $data): int|false
{
    $sql = "INSERT INTO listings (title, price, description, category_id, image, user_id)
            VALUES (:title, :price, :description, :category, :image, :user_id)";
    $query = $pdo->prepare($sql);

    $query->bindValue(":title", $data['title']);
    $query->bindValue(":price", $data['price']);
    $query->bindValue(":description", $data['description']);
    $query->bindValue(":category", $data['category'], PDO::PARAM_INT);
    $query->bindValue(":image", $data['image']);
    $query->bindValue(":user_id", $data['user_id']);

    if ($query->execute()) {
        return $pdo->lastInsertId();  // Retourne l'ID de l'annonce nouvellement insérée
    }
    
    return false;
}

