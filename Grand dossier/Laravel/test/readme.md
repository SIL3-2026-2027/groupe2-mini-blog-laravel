# 📝 Mini-Blog Laravel - Projet de Classe

Un blog simple et élégant développé avec **Laravel** et **Tailwind CSS**. Ce projet a été réalisé dans le cadre de l'apprentissage des chapitres 1 à 6 du cours Laravel (Routes, Controllers, Vues, Migrations, Eloquent ORM, Authentification).

---

## 🚀 Fonctionnalités

- **Authentification complète** (Inscription, Connexion, Déconnexion) via Laravel Breeze.
- **CRUD complet des articles** :
  - Créer un article avec une image (upload local depuis l'ordinateur).
  - Lire la liste des articles et le détail d'un article.
  - Modifier et supprimer ses propres articles.
- **Gestion des statuts** : Publier un article ou le garder en brouillon (`publie = true/false`).
- **Design moderne** : Interface responsive avec Tailwind CSS (grille de cartes, bannière, effets au survol).
- **Relations Eloquent** : Un utilisateur possède plusieurs articles (`hasMany`), un article appartient à un utilisateur (`belongsTo`).

---

## 🛠️ Technologies et Prérequis

Pour faire tourner ce projet, vous devez avoir installé sur votre machine :

- **PHP >= 8.2** (avec les extensions `pdo_mysql`, `mbstring`, `openssl`, `fileinfo` activées)
- **Composer** (Gestionnaire de dépendances PHP)
- **Node.js et NPM** (Pour compiler le CSS/JS)
- **MySQL ou MariaDB** (via XAMPP, WAMP, ou MAMP)
- **Git** (Pour cloner le projet)

*Note : Les dépendances exactes du projet sont gérées par les fichiers `composer.json` (backend) et `package.json` (frontend).*

---

##  Installation pas à pas

Suivez ces étapes dans l'ordre pour lancer le projet sur votre machine.

### 1. Cloner le dépôt
```bash
git clone https://github.com/VOTRE_ORGANISATION/NOM_DU_REPO.git
cd NOM_DU_REPO

2. Installer les dépendances PHP
bash
composer install
3. Configurer l'environnement
Copiez le fichier d'exemple .env.example et renommez-le en .env :

bash
cp .env.example .env
Générez la clé de sécurité de l'application :

bash
php artisan key:generate
4. Configurer la base de données
Ouvrez votre client MySQL (phpMyAdmin) et créez une base de données nommée mini_blog :

sql
CREATE DATABASE mini_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
Ouvrez le fichier .env et modifiez les lignes suivantes avec vos identifiants locaux :

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_blog
DB_USERNAME=root
DB_PASSWORD=
(Si vous utilisez MariaDB, vous pouvez mettre DB_CONNECTION=mariadb)

5. Lancer les migrations
Crée les tables users et articles dans la base de données :

bash
php artisan migrate
6. Créer le lien symbolique pour les images
Indispensable pour que les images uploadées dans le dossier storage soient visibles sur le site :

bash
php artisan storage:link
7. Installer et compiler les dépendances front-end
bash
npm install
npm run build
(Pour le développement, utilisez npm run dev pour activer le rechargement automatique et voir vos modifications CSS en direct).

8. Lancer le serveur
bash
php artisan serve
Ouvrez votre navigateur et allez sur http://127.0.0.1:8000.


 Structure et Rôle des Fichiers
Voici les fichiers les plus importants du projet (Chapitres 1 à 6) :

🗄️ Base de données (Chapitre 5)
database/migrations/xxxx_create_articles_table.php : Création de la table articles avec la clé étrangère user_id.

database/migrations/xxxx_add_image_to_articles_table.php : Ajout de la colonne image via Schema::table().

🧠 Modèles (Chapitre 6)
app/Models/Article.php : Modèle Eloquent de l'article (avec $fillable et relation belongsTo).

app/Models/User.php : Modèle Utilisateur (avec relation hasMany).

🎮 Controllers (Chapitre 3)
app/Http/Controllers/ArticleController.php : Gère les 7 actions du CRUD (index, create, store, show, edit, update, destroy).

🎨 Vues Blade (Chapitre 4)
resources/views/layouts/app.blade.php : Le squelette principal de la page.

resources/views/layouts/navigation.blade.php : La barre de menu.

resources/views/articles/index.blade.php : La page d'accueil avec la grille des articles.

resources/views/articles/show.blade.php : La page de lecture d'un article.

resources/views/articles/create.blade.php : Le formulaire de création.

resources/views/articles/edit.blade.php : Le formulaire de modification.

resources/views/components/carte.blade.php : Le composant réutilisable pour afficher une carte d'article.

🚦 Routes (Chapitre 2)
routes/web.php : Définition des routes de l'application (Route::resource pour les articles et les routes protégées par auth).

💻 Commandes utiles (Aide-mémoire)
Voici les commandes les plus souvent utilisées dans ce projet, classées par catégorie.

⚙️ Commandes Artisan (Laravel)
bash
# Démarrer le serveur de développement
php artisan serve

# Vider les caches (config, routes, vues)
php artisan optimize:clear

# Gérer la base de données
php artisan migrate                 # Exécuter les migrations
php artisan migrate:fresh           # Supprimer toutes les tables et tout recréer
php artisan migrate:rollback        # Annuler la dernière migration
php artisan db:show                 # Vérifier la connexion à la base de données
php artisan storage:link            # Créer le lien pour les images uploadées

# Créer des fichiers (génère le code de base)
php artisan make:model NomDuModele -m       # Modèle + Migration
php artisan make:controller NomController   # Controller
php artisan make:component NomComposant --view # Composant Blade
php artisan make:migration nom_de_la_migration # Migration seule

# Console interactive pour tester du code PHP
php artisan tinker
🎨 Commandes Front-end (NPM / Vite)
bash
# Installer les dépendances (Tailwind, etc.)
npm install

# Compiler les assets pour le développement (avec rechargement auto)
npm run dev

# Compiler les assets pour la production (fichiers minifiés)
npm run build
🐙 Commandes Git (Pour le dépôt)
bash
# Voir l'état des fichiers modifiés
git status

# Ajouter des fichiers au prochain commit
git add .                           # Tous les fichiers
git add nom_du_fichier.php          # Un seul fichier

# Enregistrer les modifications
git commit -m "Message expliquant la modification"

# Envoyer sur GitHub
git push origin nom_de_la_branche

# Changer de branche
git checkout nom_de_la_branche      # Aller sur une branche existante
git checkout -b nouvelle_branche    # Créer et aller sur une nouvelle branche
🤝 Contribution (Branche GitHub)
Ce projet est un exercice de classe. Si vous souhaitez proposer des améliorations :

Créez une branche (git checkout -b feature/amelioration).

Commitez vos changements (git commit -m 'Ajout d'une fonctionnalité').

Poussez la branche (git push origin feature/amelioration).

Ouvrez une Pull Request pour validation.