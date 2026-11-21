# RAPPORT DE TP7

Filière : Licence DI
Année universitaire :2026/2027  
Enseignant : Nefdaoui Aymane  
Travail : Individuel  
Étudiante :khadija oubella


# 1. Introduction

Dans le cadre du module de développement Web, ce TP a pour objectif de réaliser une application Web permettant de gérer les activités d'un centre de formation.

L'application permet de gérer trois entités principales : les formations, les modules et les étudiants.

Pour réaliser ce travail, nous avons utilisé HTML, CSS, Bootstrap, PHP, PDO et MySQL.

# 2. Objectifs du TP

Les principaux objectifs de ce TP sont :

- Identifier les entités et leurs relations.
- Concevoir une base de données relationnelle.
- Créer et gérer les tables avec MySQL.
- Établir une connexion entre PHP et MySQL avec PDO.
- Réaliser les opérations CRUD : Create, Read, Update et Delete.
- Gérer les relations entre les différentes tables.
- Créer une interface Web simple et organisée.

# 3. Analyse et conception

L'application repose sur trois entités principales :
<img width="952" height="513" alt="image" src="https://github.com/user-attachments/assets/ec3a48cb-ad44-41dd-b7e6-eefa4497f714" />


**3.1. Formation**

Cette entité permet de gérer les formations proposées par le centre.

Attributs utilisés :
- id : identifiant de la formation.
- titre : titre de la formation.
- prix : prix de la formation.
- <img width="1351" height="683" alt="image" src="https://github.com/user-attachments/assets/5a8fd9f5-0513-47fb-af96-dc3883927f90" />
<img width="1157" height="259" alt="image" src="https://github.com/user-attachments/assets/ad73a7fd-898e-4a79-b840-e5a70a0973f7" />


**3.2. Module**

Cette entité permet de gérer les différents modules associés aux formations.

Attributs utilisés :
- id : identifiant du module.
- nom_module : nom du module.
- Formations_id : clé étrangère qui référence une formation.

<img width="1366" height="574" alt="image" src="https://github.com/user-attachments/assets/d6605d16-b24d-4458-b69b-584bf44c7417" />
<img width="1238" height="241" alt="image" src="https://github.com/user-attachments/assets/f63a4a62-d13d-4448-9cb3-3262b468c8b2" />

**3.3. Étudiant**

Cette entité permet de gérer les étudiants inscrits au centre et leur rattachement à une formation.
Les relations entre les entités sont les suivantes :

- Une formation peut contenir plusieurs modules.
- Chaque module appartient à une seule formation.
- Une formation peut accueillir plusieurs étudiants.
- Chaque étudiant est rattaché à une seule formation.
- <img width="1322" height="677" alt="image" src="https://github.com/user-attachments/assets/1748331d-e148-451a-bc36-26bb10b68503" />


# 4. Création de la base de données

Nous avons créé une base de données MySQL nommée `tp7_crud` à l'aide de phpMyAdmin.

Cette base contient trois tables correspondant aux trois entités de l'application.

Les clés primaires permettent d'identifier chaque enregistrement, tandis que les clés étrangères permettent de représenter les relations entre les tables.
<img width="1357" height="692" alt="image" src="https://github.com/user-attachments/assets/8203b544-804c-4cb1-962b-b5f74b7c3e50" />


# 5. Organisation du projet

Le projet est organisé de manière à séparer la connexion à la base de données et les opérations de gestion de chaque entité.

Structure du projet :

```text
tp7-crud/
│
├── index.php
│
├── database/
│   └── connexion.php
│
├── formations/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── module/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
└── etudiane/
    ├── index.php
    ├── create.php
    ├── edit.php
    └── delete.php
```

# 6. Connexion à la base de données avec PDO

Nous avons créé un fichier `connexion.php` dans le dossier `database`.

Ce fichier permet d'établir une connexion entre PHP et MySQL grâce à PDO.

La connexion est centralisée afin d'être réutilisée dans les différentes pages du projet avec l'instruction `require_once`.

Nous avons également configuré la gestion des erreurs avec `PDO::ERRMODE_EXCEPTION`.
<img width="1239" height="276" alt="image" src="https://github.com/user-attachments/assets/63050075-3ffa-4273-8a82-8b8f6ad48126" />


# 7. Réalisation des opérations CRUD

Pour chaque entité, nous avons développé les quatre opérations principales.

**7.1. Create – Ajouter**

Cette opération permet d'ajouter un nouvel enregistrement dans la base de données.

Nous avons utilisé :
- Les formulaires HTML avec la méthode POST.
- `$_POST` pour récupérer les valeurs saisies.
- `prepare()` pour préparer la requête SQL.
- `execute()` pour exécuter la requête INSERT.

Après l'ajout, l'utilisateur est redirigé vers la liste des enregistrements.

**7.2. Read – Afficher**

Cette opération permet d'afficher les données enregistrées dans la base de données sous forme de tableaux HTML.

Nous avons utilisé :
- `SELECT` pour récupérer les données.
- `fetchAll(PDO::FETCH_ASSOC)` pour récupérer les résultats.
- `foreach` pour parcourir les enregistrements.
- `htmlspecialchars()` pour sécuriser l'affichage des données textuelles.

**7.3. Update – Modifier**

Cette opération permet de modifier les informations d'un enregistrement existant.

Nous avons utilisé :
- `$_GET` pour récupérer l'identifiant de l'élément à modifier.
- `SELECT` pour charger les anciennes données.
- Un formulaire prérempli avec les valeurs existantes.
- `UPDATE` avec une clause `WHERE` pour modifier uniquement l'enregistrement concerné.

Après la modification, l'utilisateur est redirigé vers la liste.

**7.4. Delete – Supprimer**

Cette opération permet de supprimer un enregistrement de la base de données.

Nous avons utilisé :
- `$_GET` pour récupérer l'identifiant.
- `DELETE FROM` pour supprimer l'enregistrement.
- `WHERE` pour cibler uniquement l'élément concerné.
- `header("Location: index.php")` pour revenir à la liste après la suppression.

Une confirmation de suppression est également proposée à l'utilisateur.

# 8. Gestion des relations entre les tables

Une partie importante de ce TP consiste à exploiter les relations entre les différentes entités.

Pour afficher le nom de la formation associée à un module, nous avons utilisé une requête SQL avec `LEFT JOIN`.

Exemple :

```sql
SELECT module.*, formations.titre
FROM module
LEFT JOIN formations
ON module.Formations_id = formations.id;
```

Cette requête permet d'afficher le titre de la formation au lieu de présenter uniquement son identifiant numérique.

Dans les formulaires d'ajout et de modification, nous avons également utilisé des listes déroulantes `select` alimentées à partir des données de la table Formation.

Ainsi, l'utilisateur peut choisir le nom d'une formation tandis que la base de données enregistre son identifiant.

# 9. Réalisation de l'interface utilisateur

Nous avons créé une page d'accueil permettant d'accéder facilement aux trois espaces de gestion :

- Formations.
- Modules.
- Étudiants.

L'interface a été réalisée avec HTML, CSS et Bootstrap 5.

Nous avons utilisé des cartes (Cards), des boutons, des icônes Bootstrap et différentes couleurs pour faciliter la navigation et améliorer la présentation de l'application.

Chaque espace propose des liens permettant de consulter les données et d'ajouter de nouveaux enregistrements.

<img width="1348" height="684" alt="image" src="https://github.com/user-attachments/assets/d5eedc34-6313-4a6b-a202-f1acf7e1128f" />
<img width="1341" height="680" alt="image" src="https://github.com/user-attachments/assets/25d6ff0c-a2de-4f4f-b0f6-048c2bd3f1c1" />



# 10. Tests de l'application

Nous avons prévu de vérifier le fonctionnement des différentes opérations :

- Affichage des listes des trois entités.
- Ajout de nouvelles formations, de nouveaux modules et étudiants.
- Modification des informations existantes.
- Suppression des enregistrements sélectionnés.
- Affichage correct des relations entre les tables.
- Navigation entre la page d'accueil et les espaces de gestion.

Ces tests permettent de vérifier le bon fonctionnement général de l'application.

# 11. Conclusion

Ce TP nous a permis de mettre en pratique les notions de développement Web Backend avec PHP et MySQL.

Nous avons appris à organiser un projet PHP, établir une connexion avec PDO, manipuler les données à travers les opérations CRUD et exploiter les relations entre plusieurs tables.

Ce travail nous a également permis de mieux comprendre l'utilisation des clés primaires, des clés étrangères et des requêtes SQL pour développer une application Web structurée.
