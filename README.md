# Conciergerie – Projet Groupe CEPPIC

Plateforme web de conciergerie développée avec Symfony.

Voir les documents : 

[Présentation Canva](https://www.canva.com/design/DAHDE5cfKJA/8FLlK-85rn5MvW4xwaUJgA/edit?utm_content=DAHDE5cfKJA&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

[Diagramme de classe](documents/diagramme_sql.png)
[Diagramme de cas d'utilisation](documents/diagramme.png)
[Fonctionnalités](documents/fonctionnalites.md)
[Personas](documents/personas.md)
[Wireframes](documents/wireframe.md)
[Data Minding](documents/data_mining.md)
[Insert SQL](documents/insert_services.sql)


## Arborescence principale

```
conciergerie/
├── assets/              # JS, CSS, contrôleurs Stimulus, Tailwind
├── bin/                 # Console Symfony
├── config/              # Config Symfony (routes, services, etc.)
├── documents/           # Docs projet, wireframes, SQL, etc.
├── migrations/          # Migrations Doctrine
├── public/              # Fichiers publics (index.php, assets, uploads)
├── src/                 # Code source PHP (contrôleurs, entités, services)
├── templates/           # Vues Twig
├── tests/               # Tests unitaires
├── translations/        # Fichiers de traduction
├── var/                 # Cache, logs
├── vendor/              # Dépendances PHP (Composer)
├── package.json         # Dépendances JS/NPM
├── composer.json        # Dépendances PHP/Composer
├── tailwind.config.js   # Config TailwindCSS
└── ...
```

## Dépendances principales

### PHP / Symfony (composer.json)
- Symfony 8 (framework, mailer, form, security, etc.)
- Doctrine ORM & Migrations
- EasyAdmin Bundle
- Twig
- Monolog, Notifier, Mailer
- Gumlet/php-image-resize
- StimulusBundle, UX Turbo

### JavaScript / CSS (package.json)
- tailwindcss
- autoprefixer
- postcss
- browser-sync
- tailwindcss-textshadow

### Frontend
- TailwindCSS (config locale, pas CDN)
- DaisyUI (CDN)
- LeafletJS (cartographie)
- HeroIcons

## Installation & développement

1. **Cloner le projet**
2. **Installer les dépendances PHP**  
   `composer install`
3. **Installer les dépendances JS**  
   `npm install`
4. **Compiler TailwindCSS**  
   - Développement : `npm run dev` (ou `npm run watch` pour rechargement auto)
   - Production : `npm run build`
5. **Configurer l’environnement**  
   - Copier `.env` → `.env.local` et adapter les variables (BDD, MAILER_DSN…)
6. **Lancer le serveur Symfony**  
   `symfony serve` ou `php -S localhost:8000 -t public`
7. **Accéder à l’application**  
   http://localhost:8000

## Fonctionnalités principales

- Inscription/connexion sécurisée
- Gestion des utilisateurs/admins (EasyAdmin)
- Système de notifications et d’emails (Symfony Mailer)
- Cartographie (LeafletJS)

## Auteurs

- Équipe CEPPIC DWWM 2026 - Sébastien, Kévin et Benjamin
