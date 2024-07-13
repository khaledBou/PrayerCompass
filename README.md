# PrayerCompass

Ceci est un POC que j'ai crée pour un interview en Freelance

## Qu'est-ce que le DDD ?

DDD est une approche pour comprendre le métier afin de le représenter dans le logiciel, et également un modèle architectural pour simplifier les problèmes métier.

##  Les principes DDD et Symfony :

Durant mes années d’expériences j’ai vu des développeurs   qui créent des entités et des repositories et disent que l’approche utilisée est du DDD, mais finalement ce n’est pas ça le DDD

## Explication simplifiée de DDD :

### Domaine : 

Cela fait référence à l'espace problème ou à l'aire thématique que votre logiciel cherche à adresser. Il englobe les concepts, les règles et la logique spécifiques à ce domaine particulier.

### Modélisation : 

DDD met l'accent sur la création d'un modèle de domaine qui représente la logique métier centrale et les règles de votre application de manière à refléter étroitement le domaine réel.

### Langage Ubiquitaire : 

Il s'agit d'un langage partagé entre les experts du domaine et les développeurs, garantissant que tout le monde utilise les mêmes termes et concepts. C'est crucial pour une modélisation de domaine précise.

### Contextes limités : 

Les grands domaines peuvent être divisés en zones plus petites et gérables appelées contextes limités, chacun ayant ses propres modèles et langage, mais contribuant tous au domaine global.

### Concepts clés : 

Entités (objets ayant une identité unique), Objets de Valeur (objets définis par leurs attributs, où l'égalité est basée sur ces attributs), Agrégats (groupes d'entités liées traitées comme une seule unité), Repositories (abstractions pour accéder et persister des objets de domaine), et Services (logique de domaine qui ne s'intègre pas naturellement dans les entités ou objets de valeur).


Application de Domain-Driven Design (DDD) à un projet Symfony qui gère les horaires de prière et les directions de prière (direction de la Qibla) dans le monde entier implique l'identification des concepts de domaine principaux, leur modélisation efficace et la structuration de votre application autour de ces concepts. Voici comment vous pouvez aborder cela :

Identification des concepts de domaine principaux :

Horaires de Prière :
- Représente les moments de la journée où les musulmans accomplissent leurs prières.
- Varie généralement en fonction de la localisation géographique et des méthodes de calcul (par exemple, organisations islamiques comme MWL, ISNA, etc.).

Direction de la Qibla :
- Désigne la direction vers laquelle les musulmans se tournent pendant leurs prières, en direction de la Kaaba à La Mecque.
- Varie également en fonction de la localisation géographique.

Modélisation du Domaine :
En DDD, vous allez créer des modèles de domaine qui reflètent ces concepts. Voici comment vous pourriez les structurer :

Entités :
- **Localisation** :
    - Représente un emplacement géographique (latitude, longitude).
    - Attributs : latitude, longitude, ville, pays, etc.
- **HorairePrière** :
    - Représente les horaires de prière pour un emplacement et une méthode de calcul spécifiques.
    - Attributs : date, fajr, lever du soleil, dhuhr, asr, maghrib, isha, méthode.
- **DirectionQibla** :
    - Représente la direction de la Qibla pour un emplacement spécifique.
    - Attributs : latitude, longitude, angleQibla.

Objets de Valeur :
- **MéthodeCalcul** :
    - Représente les différentes méthodes de calcul pour les horaires de prière (par exemple, MWL, ISNA).

Référentiels :
- **LocalisationRepository** :
    - Interface pour accéder et persister les localisations.
- **HorairePrièreRepository** :
    - Interface pour accéder et persister les horaires de prière.
- **DirectionQiblaRepository** :
    - Interface pour accéder et persister les directions de la Qibla.

Services :
- **ServiceHorairePrière** :
    - Implémente la logique pour calculer et récupérer les horaires de prière pour une localisation et une méthode de calcul données.
- **ServiceDirectionQibla** :
    - Implémente la logique pour calculer et récupérer la direction de la Qibla pour une localisation donnée.


## Architecture et Structure des Dossiers

````
src/
├── Domain/
│   ├── PrayerTime/
│   │   ├── Entity/
│   │   │   └── PrayerTime.php           # Entité PrayerTime
│   │   ├── Repository/
│   │   │   └── PrayerTimeRepository.php # Interface Repository pour PrayerTime
│   │   ├── Service/
│   │   │   └── PrayerTimeService.php    # Service pour la logique métier de PrayerTime
│   │   └── ValueObject/                 # Objets de valeur spécifiques à PrayerTime
│   ├── QiblaDirection/
│   │   ├── Entity/                      # Entité et objets de valeur pour QiblaDirection
│   │   ├── Repository/
│   │   ├── Service/
│   │   └── ValueObject/
│   └── User/
│       ├── Entity/
│       │   └── User.php                 # Entité User
│       ├── Repository/
│       │   └── UserRepository.php       # Interface Repository pour User
│       ├── Service/
│       │   └── UserService.php          # Service pour la logique métier de User
│       └── ValueObject/                 # Objets de valeur spécifiques à User
├── Infrastructure/
│   ├── API/
│   │   └── Controller/
│   │       ├── PrayerTimeController.php # Contrôleur pour les endpoints de PrayerTime
│   │       ├── QiblaDirectionController.php # Contrôleur pour les endpoints de QiblaDirection
│   │       └── UserController.php      # Contrôleur pour les endpoints de User
│   ├── Persistence/
│   │   └── Doctrine/
│   │       ├── PrayerTime/              # Implémentation Doctrine pour PrayerTime
│   │       ├── QiblaDirection/          # Implémentation Doctrine pour QiblaDirection
│   │       └── User/                    # Implémentation Doctrine pour User
│   └── Security/
│       └── JWT/
├── Application/
│   ├── PrayerTime/                      # Services d'application pour PrayerTime
│   ├── QiblaDirection/                  # Services d'application pour QiblaDirection
│   └── User/                            # Services d'application pour User
├── config/                              # Fichiers de configuration Symfony
├── migrations/                          # Fichiers de migrations Doctrine
├── tests/                               # Tests unitaires et fonctionnels
└── public/   
````

## Génération des Tables à partir des Entités

```
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

## Explication de l'Architecture DDD (Domain-Driven Design) dans le POC

- L'architecture Domain-Driven Design (DDD) est une approche de conception de logiciels qui se concentre sur la modélisation du domaine métier de l'application et sa logique. Voici une explication de l'architecture DDD mise en œuvre dans ce POC, ainsi que les raisons pour lesquelles elle a été choisie et les avantages qu'elle offre.




- Domain
    - Entity : Les entités représentent les objets métiers avec leurs propriétés et comportements. Par exemple, PrayerTime contient les informations et méthodes liées aux heures de prière.
    - Repository : Les répertoires sont responsables de la persistance des entités. Ils contiennent des méthodes pour sauvegarder, récupérer et manipuler les entités dans la base de données. Par exemple, PrayerTimeRepository gère la persistance des objets PrayerTime.

- Application
    - Service : Les services d'application contiennent la logique métier qui ne rentre pas dans les entités. Par exemple, QiblaDirectionService contient la logique pour calculer la direction de la Qibla.

- Infrastructure
  - API : Les contrôleurs d'API gèrent les requêtes HTTP et utilisent les services d'application pour traiter ces requêtes. Par exemple, PrayerTimeController et QiblaDirectionController gèrent respectivement les requêtes liées aux heures de prière et à la direction de la Qibla.
  - Shared
     - Ce dossier peut contenir des composants partagés entre différents modules, comme des exceptions personnalisées, des services communs, etc.


## Points Positifs de l'Architecture DDD

  - Modularité et Séparation des Préoccupations

    - En séparant clairement les différentes parties de l'application (domaine, application, infrastructure), on obtient un code plus modulaire et maintenable. Chaque module a une responsabilité bien définie.
  
  - Scalabilité
    - L'architecture DDD permet de gérer facilement la complexité croissante. Chaque partie de l'application peut évoluer indépendamment, facilitant l'ajout de nouvelles fonctionnalités sans perturber le reste du système.

  - Testabilité

    - La séparation des préoccupations facilite l'écriture de tests unitaires et fonctionnels. Par exemple, les services d'application peuvent être testés indépendamment des contrôleurs et des répertoires.

  - Alignement avec le Domaine Métier

    - L'accent mis sur le domaine métier permet de s'assurer que l'application reste alignée avec les besoins et la logique du domaine. Les entités et services reflètent les concepts métier, ce qui facilite la communication avec les experts métier.

  - Flexibilité

     - L'architecture DDD permet de changer facilement les implémentations techniques sans affecter la logique métier. Par exemple, on peut changer la technologie de persistance dans les répertoires sans modifier les entités ou les services d'application.

  - Conclusion
     - L'architecture DDD offre une base solide et flexible pour le développement d'applications complexes. En utilisant cette architecture dans ce POC, nous préparons le terrain pour une application évolutive et maintenable qui peut s'adapter aux changements et à la croissance future. Le choix des dossiers et la séparation des préoccupations permettent de maintenir une clarté et une cohérence tout au long du développement, facilitant la collaboration et la gestion des changements.






