# Air Voyage

Air Voyage est une application de gestion de vols permettant la création, modification, suppression et visualisation des vols, ainsi que la gestion des utilisateurs avec des rôles spécifiques (Admin, User).

## Fonctionnalités

- Gestion des vols (CRUD) : création, modification, suppression, affichage des vols.
- Gestion des utilisateurs : gestion des rôles (Admin, User).
- Gestion des réductions sur les vols.
- Affichage des villes de départ et d'arrivée avec icônes personnalisées.
- Gestion de la disponibilité des places et barres de progression pour indiquer la disponibilité des vols.


## Gestion des erreurs

Ce projet gère les erreurs courantes en redirigeant les utilisateurs vers des pages dédiées lorsqu'une erreur survient.

### Pages d'erreurs personnalisées :
- **404 - Page non trouvée** : Lorsque la page demandée n'existe pas, l'utilisateur est redirigé vers une page personnalisée avec un message d'erreur clair.
- **500 - Erreur interne du serveur** : En cas de problème avec le serveur, une page d'erreur dédiée informe l'utilisateur de l'incident.
- **403 - Accès refusé** : Si un utilisateur non autorisé tente d'accéder à une page protégée, une page 403 est affichée.

Ces pages d'erreurs ont été conçues pour offrir une meilleure expérience utilisateur et sont stylisées avec Bootstrap pour une présentation soignée et uniforme avec le reste de l'application.


## Prérequis

Avant de cloner et d'installer ce projet, assurez-vous d'avoir les éléments suivants :

- PHP >= 8.1
- Composer
- Symfony CLI
- MySQL ou tout autre serveur de base de données compatible
- Node.js (pour gérer les assets avec Webpack Encore)

## Installation

1. Clonez le dépôt GitHub :

    ```bash
    git clone https://github.com/votre-nom-utilisateur/air-voyage.git
    ```

2. Accédez au répertoire du projet :

    ```bash
    cd air-voyage
    ```

3. Installez les dépendances avec Composer :

    ```bash
    composer install
    ```

4. Créez un fichier `.env.local` pour la configuration de votre base de données :

    ```bash
    cp .env .env.local
    ```

5. Modifiez le fichier `.env.local` pour y ajouter vos informations de base de données, par exemple :

    ```env
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/nom_de_la_base_de_donnees"
    ```

6. Créez la base de données :

    ```bash
    php bin/console doctrine:database:create
    ```

7. Exécutez les migrations pour créer les tables :

    ```bash
    php bin/console doctrine:migrations:migrate
    ```

8. (Optionnel) Chargez les données de base pour les vols et utilisateurs avec les fixtures (si disponibles) :

    ```bash
    php bin/console doctrine:fixtures:load
    ```

9. Compilez les assets (CSS, JavaScript) :

    ```bash
    npm install
    npm run dev
    ```

## Utilisation

1. Lancez le serveur Symfony :

    ```bash
    symfony server:start
    ```

2. Accédez à l'application via l'URL suivante :

    ```
    http://localhost:8000
    ```

## Fonctionnalités Admin

En tant qu'administrateur (ROLE_ADMIN), vous avez accès aux fonctionnalités suivantes :
- Ajouter, modifier, et supprimer des vols.
- Gérer les utilisateurs et leurs rôles.

## Gestion des utilisateurs

- Un utilisateur avec le rôle **Admin** aura accès aux pages de gestion des utilisateurs et des vols.
- Un utilisateur avec le rôle **User** ne pourra que consulter les vols disponibles.