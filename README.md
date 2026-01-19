#  Carnet de Dettes Numérique pour le Boutique du Quartier

##  Auteurs
    - OUEDRAOGO ABDOUL RAZAQUE
    - OUEDRAOGO BEACTRICE 
Projet réalisé pour : **Cours de Programmation Web et Framework, Université Joseph Ki ZERBO L3S5**
---

##  Description du projet


Dans de nombreuses boutiques de quartier, les clients achètent parfois “à crédit”.  
Traditionnellement, le gérant note leurs dettes dans un carnet papier, ce qui peut entraîner :
    - des pertes d’informations,
    - des erreurs de calcul,
    - et des difficultés de suivi.

 Cette application web a pour objectif de **numériser la gestion des dettes** afin de fournir un outil simple et efficace pour le boutiquier.  

Elle est développée avec **Laravel (PHP), MySQL, HTML, CSS et JavaScript**.

---
###  Fonctionnalités principales
- Gestion des **clients** (ajout, modification, suppression).
- Gestion des **dettes** (ajout, modfication, suppression , notification, paiement).
- Gestion des **paiements** (historique des paiements ).
- Rappel **envoi de rappels**.
- **Export PDF** des dettes et **envoi de rappels**.
- Tableau de bord interactif avec un suivi global.

---

##  Installation

###  Prérequis

    - PHP : 8.2.12

    - Composer : 2.8.9

    - MySQL : 8.2.12


    - Laravel : 12.28.1


###  Étapes d’installation

1. **Installation du projet**

    Télécharger le projet depuis le lien fourni (Google Drive / WeTransfer).
    Décompresser le dossier téléchargé.
*   Ouvrir un terminal et se placer dans le dossier du projet :

        ```bash
            cd chemin/vers/le/dossier/Carnet-Dettes


2. **Installer les dépendances PHP et JS** :
    composer install
   


3. **Copier le fichier .env** :
    cp .env.example .env


4. **Configurer la base de données** :
## Modifier les informations de connexion dans .env :

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dette
    DB_USERNAME=laraveluser
    DB_PASSWORD=

5. **Générer la clé d’application**
    php artisan key:generate

6. **Lancer les migrations**
    php artisan migrate

7. **Lancer le serveur local**
    php artisan serve
  
**L’application sera accessible à l’adresse**: http://127.0.0.1:8000/login

8. **Utilisation**
    Se connecter avec un compte existant ou créer un compte administrateur. 
    le compte existant est : **abdoulrazaque26@gmail.com et le mot de passe est 123456** ou bien vous pouvez créer votre compte

    Naviguer dans le menu haut pour gérer les clients, dettes, paiements .

    Le tableau de bord affiche les clients et leurs dettes, et met en évidence ceux ayant le plus de dettes.

    Les fonctionnalités bonus comme export PDF, graphique, et simulation de rappel sont disponibles dans l'application .
    
9. **Structure du projet**
    app/Models : Modèles Eloquent pour Clients, Dettes, Paiements.

    app/Http/Controllers : Contrôleurs pour gérer la logique de l’application.

    resources/views : Templates Blade pour les pages HTML.

    routes/web.php : Définition des routes principales.

    public/ : Fichiers CSS, JS et images accessibles publiquement.

10. **Licence**
    Projet développé pour les besoins pédagogiques.

**NB**:  Veillez à avoir MySQL en marche avant de lancer l’application.

     Si vous utilisez Laragon, XAMPP ou WAMP, vérifiez que le port 3306 est disponible.
     Pour exporter les dettes en PDF, assurez-vous que le package barryvdh/laravel-dompdf est installé.


11. **Contributeurs**

    OUEDRAOGO ABDOUL RAZAQUE : Développeur Backend / Base de données -Développeur Frontend / Design

    OUEDRAOGO BEACTRICE : Développeur Backend / Base de données -Développeur Frontend / Design 
