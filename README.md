# Installation

- Créer et importer la base de données
- Dupliquer le fichier .env.example et le renommer .env
- Modifier les varibles du .env avec vos propres infos

# Démarrer le projet en local

# 📁 Okaz

Un petit résumé ici : ce que fait le projet, à quoi il sert, à qui il est destiné.

---

## 📦 Technologies utilisées

- ✅ PHP (PDO)
- ✅ HTML / CSS / JS
- ✅ MySQL
- ✅ Apache ou PHP server embarqué

---

## 🚀 Lancer le projet en local

1. **Cloner le projet :**

```bash
git clone https://github.com/ton-utilisateur/ton-projet.git
cd ton-projet
```

2. **Configurer la base de données :**

- Créer une base de données dans MySQL.
- Importer le fichier database/schema.sql si fourni.
- Configurer les identifiants dans config/database.php :

```php
define("DB_HOST", "localhost");
define("DB_NAME", "nom_de_ta_db");
define("DB_USER", "root");
define("DB_PASSWORD", "");
```

3. **Lancer le serveur local PHP :**

```bash
php -S localhost:3000 -t public
```

Le projet est maintenant accessible via http://localhost:3000

## 📁 Structure du projet

```plaintext
├── config/             # Fichiers de configuration (BDD, constantes...)
├── public/             # Point d'entrée (index.php, assets, routes publiques)
├── src/                # Contrôleurs, modèles, vues
│   ├── controllers/
│   ├── models/
│   └── views/
├── database/           # Scripts SQL
├── .env                # Fichier d'environnement (si utilisé)
└── README.md           # Ce fichier :)
```

## ✅ Fonctionnalités principales

- Connexion / inscription
- Gestion des utilisateurs
- CRUD sur [entité principale]
- Authentification avec sessions
- Sécurité basique (hashage, validation...)

## 📌 À faire / améliorations possibles

- Ajout d’un système de rôles (admin / user)
- Refactorisation du routeur
- Tests automatisés
- Documentation de l'API interne

## 🙌 Contribuer

Les contributions sont les bienvenues ! N’hésite pas à créer une issue ou une pull request.
Merci d'utiliser un style de code cohérent et de documenter tes ajouts.

## 🧑‍💻 Auteur

Fanny Carlier – @peterpaine01

## 📄 Licence

Ce projet est sous licence MIT – voir le fichier LICENSE pour plus d’informations.
