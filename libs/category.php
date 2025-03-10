<?php

function getCategories(): array
{
    return [
        ["name" => "Jeux vidéos", "icon" => "controller"],
        ["name" => "Meubles", "icon" => "lamp"],
        ["name" => "Vêtements", "icon" => "tag"],
      ];
}

function getCategoryById(int $id): array
{ 
    $categories = getCategories();
    return  $categories[$id];
}