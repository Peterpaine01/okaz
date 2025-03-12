<?php

function addUser(PDO $pdo, string $username, string $email, string $password): bool 
{
    $query = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    return $query->execute();
}

function verifyUser($user): array|bool
{
    $errors = [];
    // input username
    if (isset($user["username"])){
        if ($user["username"] === "") {
            $errors["username"] = "Le champ username est obligatoire";
        } 
    } else {
        $errors["username"] = "Le champ username n'a pas été envoyé";
    }

    // input email
    if (isset($user["email"])){
        if ($user["email"] === "") {
            $errors["email"] = "Le champ email est obligatoire";
        } else {
            if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Le format d'email n'est pas respecté";
            }
        }
    } else {
        $errors["email"] = "Le champ email n'a pas été envoyé";
    }

    // input password
    if (isset($user["password"])){
        if ($user["password"] === "") {
            $errors["password"] = "Le champ password est obligatoire";
        } else if (strlen($user["password"]) < 8) {
            $errors["password"] = "Le mot de passe doit faire au moins 8 caractères";
        }
    } else {
        $errors["password"] = "Le champ password n'a pas été envoyé";
    }

    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }

}

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array 
{
    $query = $pdo->prepare("SELECT id, username, email, password FROM users WHERE email = :email");
    $query->bindValue(":email", $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }
}