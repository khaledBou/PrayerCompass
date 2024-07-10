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
│   │   ├── Repository/
│   │   ├── Service/
│   │   ├── ValueObject/
│   ├── QiblaDirection/
│   │   ├── Entity/
│   │   ├── Repository/
│   │   ├── Service/
│   │   ├── ValueObject/
│   └── User/
│       ├── Entity/
│       ├── Repository/
│       ├── Service/
│       ├── ValueObject/
├── Infrastructure/
│   ├── Persistence/
│   │   ├── Doctrine/
│   │   │   ├── PrayerTime/
│   │   │   ├── QiblaDirection/
│   │   │   ├── User/
│   ├── API/
│   │   ├── Controller/
│   │   ├── DTO/
│   ├── Security/
│       ├── JWT/
├── Application/
│   ├── PrayerTime/
│   ├── QiblaDirection/
│   ├── User/
config/
migrations/
tests/
public/
````

## Explication de la Structure

- Domain/ : Contient les concepts du domaine avec leurs entités, repositories, services et value objects. Chaque sous-dossier représente un domaine spécifique comme PrayerTime, QiblaDirection, User.

- Infrastructure/ :

  - Persistence/Doctrine/ : Contient les configurations spécifiques à Doctrine pour chaque entité du domaine.
  - API/ : Contient les contrôleurs pour exposer les API REST (Controller/) et les objets de transfert de données (DTO/) utilisés pour la sérialisation des données.
  
- Application/ : Ce répertoire peut contenir des services d'application qui orchestrent des opérations complexes impliquant plusieurs entités ou domaines. Par exemple, PrayerTimeService dans Application/PrayerTime/ pourrait gérer des opérations métier complexes liées aux horaires de prière.