# Studi ECF Juin 2024 - Garage V. Parrot

## Installation

### Cloner le dépôt

Choisissez un dossier sur votre ordinateur pour votre projet.
Avec votre invite de commande préféré, clônez le dépôt:

```
git clone https://github.com/Eurz/Studi-ECF-2024.git
```

Ouvrer le dossier avec votre IDE.

### Installer les dépendances

Placeé vous dans le dossier "Studi-ECF-2024":

```
cd  ./Studi-ECF-2024
composer install
```

### Paramétrage de la base de données

Lancez dans un premier temps votre serveur local puis ouvrez le dossier du projet dans votre IDE favori.

Editez le fichier ".env" pour configurer vos informations de bases de données.

Pour cela, modifiez les informations de DATABASE_URL en fonction de votre de SGBD.
Par exemple :

```
DATABASE_URL="mysql://root@127.0.0.1:3306/studi_ecf_db?serverVersion=8.0.32&charset=utf8mb4"
```

### Création de la BDD:

Créez et alimentez la base de données avec des données factices avec les lignes de commandes suivantes :

```
php bin/console make:migration
php bin/console doctrine:migration:migrate
php bin/console doctrine:fixtures:load
```

### Naviguer sur le site

Selon votre configuration de serveur local, lancer le site.

### Accéder au backend

Pour accéder au backoffice de l'application, rajouter "/admin" dans l'url de votre site :

Trois profils sont disponibles :

```
Administrateur : admin@admin.com / admin
Employé : employee@employee.com / employee
Utilisateur : user@user.com
```
