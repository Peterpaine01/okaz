# Installation

- Créer et importer la base de données
- Dupliquer le fichier .env.example et le renommer .env
- Modifier les varibles du .env avec vos propres infos

# Démarrer le projet en local

# 📁 Okaz

Site de petites annonces : consultation, filtre, ajout

---

## 📦 Technologies utilisées

- ✅ PHP (PDO)
- ✅ HTML / CSS / JS
- ✅ MySQL
- ✅ PHP server

---

## 🚀 Lancer le projet en local

1. **Cloner le projet :**

```bash
git clone https://github.com/Peterpaine01/okaz
cd okaz
```

2. **Configurer la base de données :**

- Créer une base de données dans MySQL.
- Configurer les identifiants de connexion dans un fichier .env à partir du .env.example :

```bash
db_host=votre_serveur
db_user=votre_user
db_password=votre_password
db_database=nom_bdd
db_port=3306
```

Le projet est maintenant accessible via http://localhost:3000

## 📁 Structure du projet

```plaintext
├── app/                # Contrôleurs, modèles, vues
│   ├── controllers/
│   ├── libs/
│   ├── templates/
│   └── views/
├── config/             # Fichiers de configuration (BDD, constantes...)
├── core/               # Router
├── public/             # Point d'entrée (index.php, assets, routes publiques)
├── database/           # Scripts SQL
├── .env                # Fichier d'environnement
├── .env.example        # Fichier d'environnement en exemple
├── docker-compose.yml
├── nginx.Dockerfile
├── php.Dockerfile
└── README.md           # Ce fichier :)
```

## ✅ Fonctionnalités principales

- Connexion / inscription
- Gestion des utilisateurs
- CRUD sur listings
- Authentification avec sessions
- Sécurité basique (hashage)

## 📌 À faire / améliorations possibles

- Ajout d’un système de rôles (admin / user)
- Tests automatisés
- CRUD Category

## 🙌 Contribuer

Les contributions sont les bienvenues ! N’hésite pas à créer une issue ou une pull request.
Merci d'utiliser un style de code cohérent et de documenter tes ajouts.

## 🧑‍💻 Auteur

Fanny Carlier – @peterpaine01

## 📄 Licence

Ce projet est sous licence MIT – voir le fichier LICENSE pour plus d’informations.
